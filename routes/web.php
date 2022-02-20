<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestControllerController;
use App\Http\Controllers\TestRemembermeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\TwoFactorController;
use Illuminate\Support\Facades\Auth;


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

Route::resource('test', 'TestControllerController');

Route::get('/cookie/set', 'CookieController@setCookie');
Route::get('/cookie/get', 'CookieController@getCookie');

#Remember me functionality in Laravel
// Route::get('/user-register', 'TestRemembermeController@registerform')->name('user.register');
// Route::post('/post-registration', 'TestRemembermeController@postRegistration')->name('post.register');

// Route::get('/user-login', 'TestRemembermeController@loginform')->name('user.login');
// Route::post('/check-login', 'TestRemembermeController@checklogin')->name('post.login');

// Route::get('/user-dashboard', 'TestRemembermeController@dashboard')->name('user.dashboard');
// Route::get('logout', 'TestRemembermeController@logout')->name('logout');



// Route::redirect('/', '/login');
// Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);


/* Verification via Email Routes */
Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);


Route::group(['middleware' => ['auth', 'twofactor']], function () {
    /* Dashboard Route */
    Route::get('/home', 'HomeController@index')->name('home');

    /* Products Routs */
    Route::resource('/products', 'ProductController');

    /* Cart Routes */
    Route::get('cart', 'ProductController@cart')->name('cart');
    Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('add.to.cart');
    Route::patch('update-cart', 'ProductController@updateCart')->name('update.cart');
    Route::delete('remove-from-cart', 'ProductController@remove')->name('remove.from.cart');
});



Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Auth::routes();
