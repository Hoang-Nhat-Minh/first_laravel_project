<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog_data;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function blogShow($slug) {
        $blog = blog_data::where('slug', $slug)->first();
        return view('blogs/blogShow', compact('blog'));
    }


    //Admin
    public function createBlog()
    {
        return view('admin/blog/create');
    }


    protected $rules = [
        'ngayBlog' => 'required',
        'header' => 'required',
        'shortInfo' => 'required',
        'blogImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    protected $messages = [
        'ngayBlog.required' => 'Ngày tạo Blog là bắt buộc.',
        'header.required' => 'Tiêu đề là bắt buộc.',
        'shortInfo.required' => 'Mô tả ngắn là bắt buộc.',
        'blogImg.required' => 'Ảnh blog là bắt buộc.',
        'blogImg.image' => 'Tệp tải lên phải là hình ảnh.',
        'blogImg.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
        'blogImg.max' => 'Hình ảnh không được lớn hơn 2048KB.',
    ];
    public function storeBlog(Request $request)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        for ($i = 1; $i <= 5; $i++) {
            $rules["deltailInfo$i"] = 'nullable';
            $rules["blogDeltailImg$i"] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $messages["blogDeltailImg$i.image"] = "Tệp tải lên phải là hình ảnh.";
            $messages["blogDeltailImg$i.mimes"] = "Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.";
            $messages["blogDeltailImg$i.max"] = "Hình ảnh không được lớn hơn 2048KB.";
        }

        $data = $request->validate($rules, $messages);

        if ($request->hasFile('blogImg')) {
            $image = $request->file('blogImg');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['blogImg'] = $name;
        }

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('blogDeltailImg' . $i)) {
                $image = $request->file('blogDeltailImg' . $i);
                $name = time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/Pictures/upFormWeb');
                if (!$image->move($destinationPath, $name)) {
                    return back()->with('error', 'Đăng ảnh thất bại ' . $i . '.');
                }
                $data['blogDeltailImg' . $i] = $name;
            }
        }

        $slug = Str::slug($request->header, '-');
        $data['slug'] = $slug;

        blog_data::create($data);
        return redirect()->route('admin.blogs.showBlog')->with('success', 'Thêm blog thành công');
    }

    public function showBlog()
    {
        $blogs = blog_data::all();
        return view('admin/blog/show', ['blogs' => $blogs]);
    }

    public function editBlog(blog_data $blog)
    {
        return view('admin/blog/edit', ['blog' => $blog]);
    }

    public function updateBlog(Request $request, blog_data $blog)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        for ($i = 1; $i <= 5; $i++) {
            $rules["deltailInfo$i"] = 'nullable';
            $rules["blogDeltailImg$i"] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $messages["blogDeltailImg$i.image"] = "Tệp tải lên phải là hình ảnh.";
            $messages["blogDeltailImg$i.mimes"] = "Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.";
            $messages["blogDeltailImg$i.max"] = "Hình ảnh không được lớn hơn 2048KB.";
        }

        $data = $request->validate($rules, $messages);

        if ($request->hasFile('blogImg')) {
            $image = $request->file('blogImg');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['blogImg'] = $name;
        }

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('blogDeltailImg' . $i)) {
                $image = $request->file('blogDeltailImg' . $i);
                $name = time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/Pictures/upFormWeb');
                if (!$image->move($destinationPath, $name)) {
                    return back()->with('error', 'Đăng ảnh thất bại ' . $i . '.');
                }
                $data['blogDeltailImg' . $i] = $name;
            }
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.showBlog')->with('success', 'Sửa blog thành công');
    }

    public function destroy(blog_data $blog)
    {
        $blog->delete();
        return redirect(route('admin.blogs.showBlog'))->with('success', 'Xóa blog thành công');
    }
}
