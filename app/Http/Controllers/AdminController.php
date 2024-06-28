<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Userdata;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $allow_all = $request->attributes->get('allow_all');
        return view('admin/admin', ['allow_all' => $allow_all]);
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

            return redirect()->intended(route('admin'));
        }

        return back()->withErrors([
            'login' => 'Tài khoản mật khẩu không hợp lệ!',
        ]);
    }
    public function loginview()
    {
        return view('admin/login');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin/users/show', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        // Xóa các bản ghi userdata liên quan
        Userdata::where('email', $user->email)->delete();

        // Xóa user
        $user->delete();

        // Chuyển hướng người dùng về trang danh sách users
        return redirect(route('admin.users.showUsers'))->with('success', 'Xóa tài khoản thành công');
    }
}
