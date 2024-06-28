<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Userdata;
use App\userresevations;
use App\useritems;
use App\products_data;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'email' => 'required'
        ], [
            'name.required' => 'Chưa nhập tên tài khoản.',
            'password.required' => 'Chưa nhập mật khẩu.',
            'password.min' => 'Mật khẩu cần ít nhất 6 kí tự.',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp.',
            'email.required' => 'Chưa nhập email tài khoản.',
        ]);

        $data['password'] = bcrypt($data['password']);

        $data['role_id'] = 2; // User không có quyền quản trị viên 

        User::create($data);

        return redirect(route('index'));
    }



    public function profile(Request $request)
    {
        // Gọi phương thức get_user_data để lấy dữ liệu của người dùng

        list($name, $email, $userdata) = $this->get_user_data();
        $i = 1; // Biến mới để kiểm tra điều kiện

        //Lịch sử đặt bàn
        $reservations = userresevations::where('email', $email)->get();

        // Truyền dữ liệu vào view
        return view('profile', compact('i', 'reservations'), ['name' => $name, 'email' => $email, 'userdata' => $userdata]);
    }

    public function changeI(Request $request)
    {
        list($name, $email, $userdata) = $this->get_user_data();

        $i = 0;

        if (Auth::check() && Auth::user()->role_id == 1) {
            // Cho phép thêm, xóa, chỉnh sửa
            $request->attributes->add(['allow_all' => true]);
        }
        $allow_all = $request->attributes->get('allow_all');

        return view('profile', compact('i'), ['name' => $name, 'email' => $email, 'userdata' => $userdata, 'allow_all' => $allow_all]);
    }

    // Phương thức trích xuất để lấy dữ liệu của người dùng
    private function get_user_data()
    {
        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;

        // Truy vấn dữ liệu từ bảng userdata
        $userdata = Userdata::where('email', $email)->first();

        // Trả về một mảng chứa tên, email và userdata
        return [$name, $email, $userdata];
    }

    public function updateProfile(Request $request)
    {

        $data = $request->validate([
            'ngaysinh' => 'required',
            'gioitinh' => 'required',
            'diachi' => 'required',
            'sodt' => 'required|max:13',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'ngaysinh.required' => 'Chưa nhập ngày sinh.',
            'gioitinh.required' => 'Chưa nhập giới tính.',
            'diachi.required' => 'Xin hãy nhập địa chỉ để chúng tôi có thể giao hàng.',
            'sodt.required' => 'Xin hãy nhập số điện thoại để chúng tôi có thể liên lạc.',
            'avatar.image' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.max' => 'Tệp tải lên phải là hình ảnh.',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        $data['nickname'] = $request->input('nickname');

        $data['email'] = Auth::user()->email;

        Userdata::create($data);

        return redirect(route('profile'));
    }

    public function update(Request $request, Userdata $userdata)
    {
        $user = Auth::user();

        $data = $request->validate([
            'ngaysinh' => 'required',
            'gioitinh' => 'required',
            'diachi' => 'required',
            'sodt' => 'required|max:13',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'ngaysinh.required' => 'Chưa nhập ngày sinh.',
            'gioitinh.required' => 'Chưa nhập giới tính.',
            'diachi.required' => 'Xin hãy nhập địa chỉ để chúng tôi có thể giao hàng.',
            'sodt.required' => 'Xin hãy nhập số điện thoại để chúng tôi có thể liên lạc.',
            'avatar.image' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.max' => 'Tệp tải lên phải là hình ảnh.',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        $data['nickname'] = $request->input('nickname');

        $userdata = Userdata::where('email', $user->email)->first();

        $userdata->update($data);

        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Chưa nhập tên tài khoản.',
            'password.required' => 'Chưa nhập mật khẩu.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'login' => 'Tài khoản mật khẩu không hợp lệ!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //Resevation
    public function userresevation(Request $request)
    {
        $data = $request->validate([
            'ngaydat' => 'required|date|after:today',
            'thoigian' => 'required',
            'soluongnguoi' => 'required',
        ], [
            'ngaydat.required' => 'Bạn chưa điền ngày.',
            'thoigian.required' => 'Chưa điền giờ ăn',
            'soluongnguoi.required' => 'Bạn chưa điền sống lượng người.',
            'ngaydat.after' => 'Không đặt trước và trong hôm nay.',
        ]);

        $data['email'] = Auth::user()->email;
        userresevations::create($data);

        return redirect()->route('profile');
    }

    public function destroyresevation(userresevations $resevation)
    {
        $resevation->delete();
        return redirect(route('profile'))->with('success', 'Hủy thành công');
    }

    public function userbookitem(Request $request, $name)
    {
        $data = $request->all();
        $data['email'] = Auth::user()->email;

        //Lấy tên của sản phẩm
        $data['name'] = $name;

        useritems::create($data);

        return redirect()->route('profile');
    }


    public function destroybookitem(useritems $item)
    {
        $item->delete();
        return redirect(route('profile'))->with('success', 'Hủy thành công');
    }
}