<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/menu', [PageController::class, 'menu'])->name('menu');

Route::get('/resevation', [PageController::class, 'resevation'])->name('resevation');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/dangki', [UserController::class, 'store'])->name('dangki.store');

Route::get('/dangki', [PageController::class, 'dangki'])->name('dangki');

Route::get('/onlineStore', [PageController::class, 'onlineStore'])->name('onlineStore');

Route::get('/blogNews', [PageController::class, 'blogNews'])->name('blogNews');

Route::get('/blog/{slug}', [BlogController::class, 'blogShow'])->name('blog.show');

Route::get('/product/{slug}', [ShopController::class, 'productShow'])->name('product.show');

//User
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::put('/update', [UserController::class, 'update'])->name('update');

    Route::post('/changeI', [UserController::class, 'changeI'])->name('changeI');

    Route::post('/resevation/make', [UserController::class, 'userresevation'])->name('user.resevation');

    Route::post('/product/{name}', [UserController::class, 'userbookitem'])->name('user.book.item');

    Route::delete('/profile/{item}', [UserController::class, 'destroybookitem'])->name('destroy.book.item');

    Route::delete('/resevation/{resevation}', [UserController::class, 'destroyresevation'])->name('destroy.resevation');
});

//Đăng nhập,Facebook,Google
Route::get('/login', [PageController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('admin/login', [AdminController::class, 'loginview'])->name('admin.login');

Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('auth/facebook', [FacebookController::class, 'facebookpage'])->name('facebooklogin');

Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect'])->name('facebookredirect');

Route::get('auth/google', [GoogleController::class, 'googlepage'])->name('googlelogin');

Route::get('auth/google/callback', [GoogleController::class, 'googleredirect'])->name('googleredirect');

//Admin
Route::middleware(['checkAdmin'])->prefix('admin')->group(function () {
    //Admin home
    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    //Chỉnh sửa Blog
    Route::get('/blog/create', [BlogController::class, 'createBlog'])->name('admin.blogs.createBlog');

    Route::get('/blog/show', [BlogController::class, 'showBlog'])->name('admin.blogs.showBlog');

    Route::post('/blog/edit', [BlogController::class, 'storeBlog'])->name('admin.blogs.store');

    Route::get('/blog/{blog}/edit', [BlogController::class, 'editBlog'])->name('admin.blogs.edit');

    Route::put('/blog/{blog}', [BlogController::class, 'updateBlog'])->name('admin.blogs.update');

    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

    //Chỉnh sửa shop
    Route::get('/shop/create', [ShopController::class, 'createProduct'])->name('admin.product.createProduct');

    Route::get('/shop/show', [ShopController::class, 'showProduct'])->name('admin.product.showProduct');

    Route::post('/shop/edit', [ShopController::class, 'storeProduct'])->name('admin.product.storeProduct');

    Route::get('/shop/{product}/edit', [ShopController::class, 'editProduct'])->name('admin.product.edit');

    Route::put('/shop/{product}', [ShopController::class, 'updateProduct'])->name('admin.product.update');

    Route::delete('/shop/{product}', [ShopController::class, 'destroy'])->name('admin.product.destroy');

    //Quản lý User
    Route::get('/user/show', [AdminController::class, 'showUsers'])->name('admin.users.showUsers');

    Route::delete('/user/{user}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
});


//Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');