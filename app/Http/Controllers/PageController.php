<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\blog_data;
use App\products_data;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        return view('index');
    }


    public function menu()
    {
        return view('menu');
    }

    public function resevation()
    {
        return view('resevation');
    }

    public function blogNews()
    {
        $blogs = blog_data::paginate(4);
        
        return view('blogNews', ['blogs' => $blogs]);
    }


    public function contact()
    {
        return view('contact');
    }

    public function onlineStore()
    {
        $products = products_data::paginate(4);

        return view('onlinestore',['products' => $products]);
    }

    public function login()
    {
        return view('login');
    }

    public function dangki()
    {
        return view('dangki');
    }
}