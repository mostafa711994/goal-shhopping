<?php

use App\Category;
use App\Product;
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



Route::get('/register', function () {
    return view('register')->with('categories',Category::all());
})->name('register');
Route::get('/login', function () {
    return view('login')->with('categories',Category::all());
})->name('login');


Route::get('/artisan/storage', function() {
    $command = 'storage:link';
    $result = \Illuminate\Support\Facades\Artisan::call($command);
    return \Illuminate\Support\Facades\Artisan::output();
});


Route::post('/login', 'LoginController@login')->name('login');
Route::post('/register', 'UserController@register')->name('register');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/paginate', 'ShopController@paginate')->name('paginate');

Route::get('/search', 'ShopController@search')->name('search');
Route::get('/shopPaginate', 'ShopController@shopPaginate')->name('shopPaginate');

Route::get('/shop/category/{category}', 'ShopController@category')->name('category');
Route::get('/shop/categoryPaginate/{category}', 'ShopController@categoryPaginate')->name('categoryPaginate');

Route::get('/shop/categorySearch/{category}', 'ShopController@categorySearch')->name('categorySearch');

Route::get('/shop/tag/{tag}', 'ShopController@tag')->name('tag');
Route::get('/shop/tagPaginate/{tag}', 'ShopController@tagPaginate')->name('tagPaginate');

Route::get('/shop/tagSearch/{tag}', 'ShopController@tagSearch')->name('tagSearch');

Route::get('/shop/product/{product}', 'ShopController@show')->name('show');
Route::get('/contact', 'MessageController@create')->name('contact');
Route::get('/product/comments', 'CommentController@create')->name('create');


Route::group(['middleware'=> ['auth']], function (){
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::post('/contact/message', 'MessageController@store')->name('message');

    Route::post('/product/{product}/comments', 'CommentController@store')->name('store');
    Route::post('/contact/message', 'MessageController@store')->name('message');
    Route::get('/profile/{user}/edit','UserController@showProfile')->name('show-profile');
    Route::put('/profile/{user}','UserController@Profile')->name('profile');
    Route::get('/cart','CartController@index')->name('cart');
    Route::post('/add-cart','CartController@add')->name('add-cart');
    Route::get('/add-product-cart/{id}','CartController@productCart')->name('add-product-cart');
    Route::get('/cart/delete/{id}','CartController@delete')->name('cart-delete');
    Route::get('/cart/incr/{id}/{qty}','CartController@incr')->name('cart-incr');
    Route::get('/cart/dcr/{id}/{qty}','CartController@dcr')->name('cart-dcr');
    Route::get('/order','OrderController@create')->name('create-order');
    Route::post('/order/store','OrderController@store')->name('store-order');
    Route::get('/cart/payment','OrderController@payment')->name('create-payment');
    Route::post('/cart/pay','OrderController@pay')->name('pay');
    Route::get('/cart/payment/confirmation','OrderController@confirmation')->name('confirmation');



});




Route::group(['middleware'=> ['isAdmin']], function (){


    Route::get('/admin','DashboardController@index')->name('dashboard');
    Route::resource('users','UserController');
    Route::resource('categories','CategoryController');
    Route::resource('tags','TagController');
    Route::resource('products','ProductController');
    Route::get('trash-products', 'ProductController@trash')->name('trashedProducts');
    Route::put('restore-products/{product}','ProductController@restore')->name('restoreProducts');
    Route::get('product-notification', 'UserController@notifications')->name('product-notification');
    Route::get('/product-topbarNotification/{product}', 'NotificationController@productNotification')->name('product-topbarNotification');
    Route::get('/comment-topbarNotification/{product}', 'NotificationController@commentNotification')->name('comment-topbarNotification');
    Route::get('/messages', 'MessageController@index')->name('get-message');
    Route::get('/comments', 'CommentController@index')->name('comment.index');
    Route::post('/comments/{comment}', 'CommentController@destroy')->name('comment.destroy');


});




