<?php
use Illuminate\Support\Facades\Route;
use App\user;
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

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
})->name('Home');


//////*************contact**********************

Route::get('/contactUs', 'ContactUsController@index')->name('contact');

Route::post('/message/store', 'MessageController@store')->name('sandmessage');


////**************messages****************

Route::group(['prefix' => 'messages'], function (){

    Route::get('show', 'MessageController@index')->name('messages');

    Route::get('show/{id}', 'MessageController@index')->name('yourmessages');

    Route::get('{id}/delete', 'MessageController@destroy')->name('deletemessage');
});


//************Reviews*******************

Route::group(['prefix' => 'reviews'], function () {

    Route::post('{id}/store', 'ReviewController@store')->name('store');

    Route::get('{id}/index', 'ReviewController@showRev')->name('reviews');

    Route::get('{id}/delete', 'ReviewController@destroy')->name('deletereview');

    Route::get('','ReviewController@index')->name('allreviews');
});


/////////******************Carts***********************************

Route::group(['prefix' => 'cart'], function (){

    Route::post('{id}/store','CusproController@store')->name('cart');

    Route::get('show','CusproController@index')->name('cartorder');

    Route::get('{id}/delete', 'CusproController@destroy')->name('deletecart');

});


/////////******************orders***********************************

Route::group(['prefix' => 'orders'], function () {

    Route::get('index', 'OrderController@index')->name('orders');
 
    Route::post('{id}/store', 'OrderController@store')->name('orderstore');

    Route::get('{id}/edit', 'OrderController@edit')->name('editorder');

    Route::post('{id}/update', 'OrderController@update')->name('orderupdate');

    Route::get('{id}/delete', 'OrderController@destroy')->name('deleteorder');
});


//////////******************products*************************************

Route::get('/create', function(){

    return view('post.create');

});

Route::group(['prefix' => 'posts'], function () {
    Route::get('index', 'ProductController@index')->name('posts');

    Route::get('all', 'ProductController@show')->name('allposts');

    Route::post('store', 'ProductController@store')->name('create');

    Route::get('{id}/edit', 'ProductController@edit')->name('editPost');

    Route::post('{id}/update', 'ProductController@update')->name('updatePost');

    Route::get('{id}/delete', 'ProductController@destroy')->name('deletePost');
});

Route::get('/', 'ProductController@create')->name('showPost');

Route::get('product/{id}/show', 'ProductController@showPro')->name('showProduct');


////**************user****************

Route::get('/user/index', 'UsersController@index')->name('users');

Route::get('/profile', 'UsersController@count')->name('profile');

Route::get('all', 'UsersController@show')->name('allusers');

Route::get('deleteuser/{id}', 'UsersController@deleteuser')->name('deluser');

Route::group(['prefix' => 'profile'], function () {

    Route::get('edit/{user_id}', 'UsersController@edit')->name('edit');

    Route::post('{id}/image', 'UsersController@updateimage')->name('updateimage');

    Route::post('{us_id}/update', 'UsersController@update')->name('updateinfo');

    Route::get('/delete/{id}', 'UsersController@destroy')->name('deleteUsers');

});
