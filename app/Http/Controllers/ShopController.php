<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products_data;
use Illuminate\Support\Str;

class shopController extends Controller
{
    public function productShow($slug)
    {
        $product = products_data::where('slug', $slug)->first();
        return view('shop/shopShow', compact('product'));
    }


    //Admin
    public function createProduct()
    {
        return view('admin/shop/create');
    }

    protected $rules = [
        'name' => 'required|unique:products_data,name',
        'price' => 'required',
        'shortInfo' => 'required',
        'deltailInfo' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Chưa nhập tên sản phẩm.',
        'name.unique' => 'Sản phẩm đã tồn tại.',
        'price.required' => 'Chưa nhập giá sản phẩm.',
        'shortInfo.required' => 'Chưa nhập tóm tắt sản phẩm.',
        'deltailInfo.required' => 'Chưa nhập chi tiết sản phẩm.',
    ];

    public function storeProduct(Request $request)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        $data = $request->validate($rules, $messages);

        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('productImg')) {
            $image = $request->file('productImg');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['productImg'] = $name;
        }

        products_data::create($data);
        return redirect()->route('admin.product.showProduct')->with('success', 'Thêm sản phẩm thành công');
    }

    public function showProduct()
    {
        $products = products_data::all();
        return view('admin/shop/show', ['products' => $products]);
    }

    public function editProduct(products_data $product)
    {
        return view('admin/shop/edit', ['product' => $product]);
    }

    public function updateProduct(Request $request, products_data $product)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        $data = $request->validate($rules, $messages);

        if ($request->hasFile('productImg')) {
            $image = $request->file('productImg');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['productImg'] = $name;
        }

        $product->update($data);
        return redirect()->route('admin.product.showProduct')->with('success', 'Sửa sản phẩm thành công');
    }

    public function destroy(products_data $product)
    {
        $product->delete();
        return redirect(route('admin.product.showProduct'))->with('success', 'Xóa sản phẩm thành công');
    }
}
