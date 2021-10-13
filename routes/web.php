<?php

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

Route::get('change/{locale}', function ($locale) {
	App::setLocale($locale);
  session(['locale' => $locale]);
  return Redirect::back();
});

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/presentation', 'HomeController@presentation');
Route::get('/contact_us', 'HomeController@contact_us');
Route::get('/all_vouchers', 'HomeController@all_vouchers');

Route::post('/add_vouchers', 'HomeController@add_vouchers');
Route::post('/add_vouchers_cart', 'HomeController@add_vouchers_cart');


Route::post('/api/add_contact', 'HomeController@add_contact')->name('add_contact');
Route::post('/api/add_my_product_home', 'HomeController@add_my_product_home')->name('add_my_product_home');
Route::post('/add_subscribe', 'HomeController@add_subscribe');
Route::get('shop/{id}', 'HomeController@shop');
Route::get('privacy', 'HomeController@privacy');
Route::get('terms', 'HomeController@terms');
Route::get('delete_account', 'HomeController@delete_account');
Route::get('/all_shop', 'HomeController@all_shop');

Route::get('category/{id}', 'HomeController@category');
Route::get('category/{id}/{ratting}', 'HomeController@category_rate');
Route::get('category_price/{id}/{price}', 'HomeController@category_price');
Route::post('/add_wishlist', 'HomeController@add_wishlist');

Route::post('/add_confirm_payment', 'HomeController@add_confirm_payment');
Route::get('/success_payment', 'HomeController@success_payment');
Route::post('/buy_item', 'HomeController@buy_item');
Route::get('search', 'HomeController@search');
Route::get('/cart', 'HomeController@cart');
Route::post('/updateCart', 'HomeController@updateCart');

Route::post('/post_payment_notify', 'HomeController@post_payment_notify');

Route::get('/order_complete/{id}', 'HomeController@order_complete');


Route::get('/pay_order_detail/{id}', 'HomeController@pay_order_detail');

Route::get('/confirm_payment', 'HomeController@confirm_payment');
Route::get('product/{id}', 'HomeController@product');
Route::post('/add_session_value', 'HomeController@add_session_value');
Route::get('deleteCart/{id}', 'HomeController@deleteCart');
Route::post('/post_review_product', 'HomeController@post_review_product');
Route::post('/post_review_shop', 'HomeController@post_review_shop');


Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

	
Route::post('add_my_address', 'HomeController@add_my_address');

Route::get('wishlist', 'HomeController@wishlist');
Route::post('del_wishlist', 'HomeController@del_wishlist');



Route::get('/shipping', 'HomeController@shipping');
Route::get('/payment/{id}', 'HomeController@payment');
Route::post('/add_order', 'HomeController@add_order');
Route::get('confirmation/', 'HomeController@confirmation');

Route::get('my_account/', 'ProfileController@my_account');
Route::get('delete_my_account', 'ProfileController@delete_my_account');
Route::get('api/delete_my_account/{id}', 'ProfileController@confirm_delete_my_account');

Route::get('my_account/{id}/edit', 'ProfileController@edit_my_account');
Route::post('post_edit_profile', 'ProfileController@post_edit_profile')->name('post_edit_profile');
Route::get('/payment_notify', 'ProfileController@payment_notify');
Route::get('/user_purchase', 'ProfileController@user_purchase');

Route::get('user_coupon/', 'ProfileController@user_coupon');
Route::get('payment_notify_item2/{id}', 'ProfileController@payment_notify_item2');

});


Route::group(['middleware' => ['UserRole:manager|employee']], function() {


  Route::get('admin/set_text', 'TextSettingController@set_text');
	Route::post('admin/set_text/{id}', 'TextSettingController@up_set_text');

	Route::get('admin/first_shop', 'ShopController@first_shop');
	Route::post('add_sort_shop', 'ShopController@add_sort_shop');
	Route::post('admin/search_shop', 'ShopController@search_shop');

	Route::resource('admin/user', 'StudentControlle');
	Route::resource('admin/category', 'CategoryController');
	Route::resource('admin/shop', 'ShopController');
	Route::post('api/post_status_order', 'ShopController@post_status_order');
	Route::get('api/del_shop_id/{id}', 'ShopController@del_shop_id')->name('del_shop_id');

	Route::post('add_gallery_shop', 'ShopController@add_gallery_shop');
	Route::post('property_image_del', 'ShopController@property_image_del');

	Route::post('add_gallery_shop_2', 'ShopController@add_gallery_shop_2');
	Route::post('property_image_del_2', 'ShopController@property_image_del_2');
	Route::resource('admin/proshop', 'ProshopController');
	Route::post('api/api_post_status_shop', 'ProshopController@api_post_status_shop');
    Route::post('api/api_post_status_product', 'ProshopController@api_post_status_product');

	Route::post('add_gallery_shop_product', 'ProshopController@add_gallery_shop_product');
	Route::post('property_image_del_product', 'ProshopController@property_image_del_product');

	Route::resource('admin/banner', 'BannerController');
	Route::post('api/post_status_banner', 'BannerController@post_status_banner');
	Route::get('api/del_banner/{id}', 'BannerController@del_banner')->name('del_banner');

	Route::get('admin/review_shop', 'ReviewController@review_shop');
	Route::get('admin/review_product', 'ReviewController@review_product');
	Route::post('api/post_status_re_shop', 'ReviewController@post_status_re_shop');
    Route::post('api/post_status_re_product', 'ReviewController@post_status_re_product');

	Route::get('api/del_review_shop/{id}', 'ReviewController@del_review_shop')->name('del_review_shop');
	Route::get('api/del_review_product/{id}', 'ReviewController@del_review_product')->name('del_review_product');

	Route::resource('admin/free_shipping', 'GiftController');
	Route::post('api/post_status_gift', 'GiftController@post_status_gift');
	Route::get('api/del_gift/{id}', 'GiftController@del_gift')->name('del_gift');

	Route::resource('admin/order', 'OrderController');
	Route::get('api/del_order/{id}', 'OrderController@del_order')->name('del_order');
	Route::post('api/api_post_status_order', 'OrderController@api_post_status_order');
	Route::post('admin/search_order', 'OrderController@search_order');
	

});
