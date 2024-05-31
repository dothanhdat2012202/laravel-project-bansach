<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\BannerBackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\InvoiceBackendController;
use App\Http\Controllers\Backend\RevenueController;
use App\Http\Controllers\Backend\SetofbookController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('homeproduct.index');
// });
// -------------------------Client----------------------------------------------------------------

Route::get('/',[ProductController::class,'index'])->name('product.index');

Route::get('/payment123',[ProductController::class,'payment'])->name('payment');
Route::get('/product/{id}',[ProductController::class,'detail'])->name('product.detail');

Route::get('/productbycategory/{category_id}',[ProductController::class,'productbycategory'])->name('product.productbycategory');
Route::get('/productbysob/{sob_id}',[ProductController::class,'productbysob'])->name('product.productbysob');

//------------------------Admin--------------------------------------------------------------------

// Route::get('/book',[ProductBackendController::class,'index'])->name('book.index')->middleware('admin');
Route::group(['prefix'=>'book'],function(){
    Route::get('index',[ProductBackendController::class,'index'])->name('book.index')->middleware('admin');
    Route::get('create',[ProductBackendController::class,'create'])->name('book.create')->middleware('admin');
    Route::post('store',[ProductBackendController::class,'store'])->name('book.store');
    Route::get('edit/{id}',[ProductBackendController::class,'edit'])->where(['id' => '[0-9]+'])->name('book.edit')->middleware('admin');
    Route::post('update/{id}',[ProductBackendController::class,'update'])->where(['id' => '[0-9]+'])->name('book.update')->middleware('admin');
    Route::delete('destroy/{id}',[ProductBackendController::class,'destroy'])->where(['id' => '[0-9]+'])->name('book.destroy')->middleware('admin');

    Route::delete('deleteImage/{id}',[ProductBackendController::class,'deleteImage']);
});




Route::group(['prefix'=>'user'],function(){
    Route::get('index',[UserController::class,'index'])->name('user.index')->middleware('admin');
    Route::get('create',[UserController::class,'create'])->name('user.create')->middleware('admin');
    Route::post('store',[UserController::class,'store'])->name('user.store');
    Route::get('{id}/edit',[UserController::class,'edit'])->where(['id' => '[0-9]+'])->name('user.edit')->middleware('admin');
    Route::post('{id}/update',[UserController::class,'update'])->where(['id' => '[0-9]+'])->name('user.update')->middleware('admin');
    Route::get('{id}/delete',[UserController::class,'delete'])->where(['id' => '[0-9]+'])->name('user.delete')->middleware('admin');
    Route::delete('{id}/destroy',[UserController::class,'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy')->middleware('admin');
});
Route::group(['prefix'=>'invoice'],function(){
    Route::get('index',[InvoiceBackendController::class,'index'])->name('invoice.index')->middleware('admin');
    Route::get('get_invoice_detail/{id}',[InvoiceBackendController::class,'getInvoiceDetail'])->name('getInvoiceDetail')->middleware('admin');
    // Route::post('store',[UserController::class,'store'])->name('user.store');
    // Route::get('{id}/edit',[UserController::class,'edit'])->where(['id' => '[0-9]+'])->name('user.edit')->middleware('admin');
    // Route::post('{id}/update',[UserController::class,'update'])->where(['id' => '[0-9]+'])->name('user.update')->middleware('admin');
    // Route::get('{id}/delete',[UserController::class,'delete'])->where(['id' => '[0-9]+'])->name('user.delete')->middleware('admin');
    // Route::delete('{id}/destroy',[UserController::class,'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy')->middleware('admin');
});
Route::group(['prefix'=>'banner'],function(){
    Route::get('index',[BannerBackendController::class,'index'])->name('banner.index')->middleware('admin');
    Route::get('create',[BannerBackendController::class,'create'])->name('banner.create')->middleware('admin');
    Route::post('store',[BannerBackendController::class,'store'])->name('banner.store')->middleware('admin');
    Route::get('edit/{id}',[BannerBackendController::class,'edit'])->where(['id' => '[0-9]+'])->name('banner.edit')->middleware('admin');
    Route::post('update/{id}',[BannerBackendController::class,'update'])->where(['id' => '[0-9]+'])->name('banner.update')->middleware('admin');
    Route::delete('destroy/{id}',[BannerBackendController::class,'destroy'])->where(['id' => '[0-9]+'])->name('banner.destroy')->middleware('admin');
});

Route::group(['prefix'=>'category'],function(){
    Route::get('index',[CategoryController::class,'index'])->name('category.index')->middleware('admin');
    Route::post('store',[CategoryController::class,'store'])->name('category.store')->middleware('admin');
    Route::get('edit/{id}',[CategoryController::class,'edit'])->where(['id' => '[0-9]+'])->name('category.edit')->middleware('admin');
     Route::post('update/{id}',[CategoryController::class,'update'])->where(['id' => '[0-9]+'])->name('category.update')->middleware('admin');
     Route::delete('destroy/{id}',[CategoryController::class,'destroy'])->where(['id' => '[0-9]+'])->name('category.destroy')->middleware('admin');
});


Route::group(['prefix'=>'setofbook'],function(){
    Route::get('index',[SetofbookController::class,'index'])->name('setofbook.index')->middleware('admin');
    Route::post('store',[SetofbookController::class,'store'])->name('setofbook.store')->middleware('admin');
    Route::get('edit/{id}',[SetofbookController::class,'edit'])->where(['id' => '[0-9]+'])->name('setofbook.edit')->middleware('admin');
    Route::post('update/{id}',[SetofbookController::class,'update'])->where(['id' => '[0-9]+'])->name('setofbook.update')->middleware('admin');
    Route::delete('destroy/{id}',[SetofbookController::class,'destroy'])->where(['id' => '[0-9]+'])->name('setofbook.destroy')->middleware('admin');
});


Route::get('admin',[AuthController::class,'index'])->name('auth.admin')->middleware('login');
Route::post('login',[AuthController::class,'login'])->name('auth.login');
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');

Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

Route::get('user/index',[UserController::class,'index'])->name('user.index')->middleware('admin');


/////////



// ajax
Route::get('ajax/location/getLocation',[LocationController::class,'getLocation'])->name('ajax.location.index')->middleware('admin');

Route::post('add_to_cart',[ProductController::class,'addtocart'])->name('add_to_cart');
Route::get('delete_from_cart/{id}',[ProductController::class,'deletefromcart'])->name('delete_cart');

Route::get('showcart',[ProductController::class,'showcart'])->name('showcart');
Route::get('checkout_page',[ProductController::class,'checkout_page'])->name('checkout_page');
Route::get('search',[ProductController::class,'apiSearchProduct'])->name('search');
Route::post('update_cart',[ProductController::class,'update_cart'])->name('update_cart');


// Route::group(['middleware' => 'checkRole:client'], function () {
    Route::post('client_login',[CustomerController::class,'login'])->name('client_login');
    Route::post('client_signup',[CustomerController::class,'store'])->name('client_signup');
    Route::get('client_logout',[CustomerController::class,'logout'])->name('client_logout');
// });



//cong thanh toan dien tu
Route::post('vn_payment',[ProductController::class,'vn_payment'])->name('vn_payment');
Route::get('callback',[ProductController::class,'callback'])->name('callback');
//doanh thu
Route::get('revenue',[RevenueController::class,'RevenueByMonth'])->name('revenue');


//ma giam giá

Route::post('/discount',[ProductController::class,'getdiscountcode'])->name('discount');

Route::get('order/{id}',[ProductController::class,'order'])->name('order');