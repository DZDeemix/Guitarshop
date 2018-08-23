<?php

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
Route::get('/logout', ['uses'=>'\App\Http\Controllers\Auth\LoginController@logout', 'as'=>'logout']);
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', ['uses'=>'MainController@index', 'as'=>'main']);
Route::get('/about', ['uses'=>'MainController@about', 'as'=>'about']);

//Марщруты продуктов
Route::get('/product/{alias}', ['uses'=>'ProductController@show_product', 'as'=>'product_show']);
Route::get('/products', ['uses'=>'ProductController@products', 'as'=>'products_show']);
//Марщруты постов
Route::get('/post/{alias}', ['uses'=>'PostController@show_post', 'as'=>'post_show']);
Route::get('/blog', ['uses'=>'PostController@get_post', 'as'=>'all_posts']);

//Марщруты для нового заказа
Route::get('/order/new_order_show', ['uses'=>'OrderController@new_order_show', 'as'=>'new_order_show']);
Route::post('/order/new_order/', ['uses'=>'OrderController@new_order', 'as'=>'new_order']);

//Марщруты для нового заказа
Route::get('/search{s?}', ['uses'=>'SearchController@search', 'as'=>'search']);
Route::post('autocomplite', ['uses'=>'SearchController@autocomplite', 'as'=>'autocomplite']);




/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function (){

    Route::get('/', ['uses'=>'Admin\AdminOrderController@show_orders', 'as'=>'admin']);

    //Маршруты для постов
    Route::get('/post/add', ['uses'=>'Admin\AdminPostController@show_addpost', 'as'=>'admin_add_post_show']);
    Route::post('/post/add', ['uses'=>'Admin\AdminPostController@addpost', 'as'=>'admin_add_post']);
    Route::get('/posts/show', ['uses'=>'Admin\AdminPostController@show_posts', 'as'=>'admin_posts_show']);
    Route::get('/post/edit/{alias}', ['uses'=>'Admin\AdminPostController@show_editpost', 'as'=>'admin_edit_post_show']);
    Route::post('/post/edit/{alias}', ['uses'=>'Admin\AdminPostController@editpost', 'as'=>'admin_edit_post']);
    Route::get('/post/delete/{alias}', ['uses'=>'Admin\AdminPostController@deletepost', 'as'=>'admin_delete_post']);
    Route::get('/post/restore/{alias}', ['uses'=>'Admin\AdminPostController@restorepost', 'as'=>'admin_restore_post']);

    //Маршруты для продуктов
    Route::get('/product/add', ['uses'=>'Admin\AdminProductController@show_addproduct', 'as'=>'admin_add_product_show']);
    Route::post('/product/add', ['uses'=>'Admin\AdminProductController@addproduct', 'as'=>'admin_add_product']);
    Route::get('/products/show', ['uses'=>'Admin\AdminProductController@show_products', 'as'=>'admin_products_show']);
    Route::get('/product/edit/{alias}', ['uses'=>'Admin\AdminProductController@show_editproduct', 'as'=>'admin_edit_product_show']);
    Route::post('/product/edit/{alias}', ['uses'=>'Admin\AdminProductController@editproduct', 'as'=>'admin_edit_product']);
    Route::get('/product/delete/{alias}', ['uses'=>'Admin\AdminProductController@deleteproduct', 'as'=>'admin_delete_product']);
    Route::get('/product/restore/{alias}', ['uses'=>'Admin\AdminProductController@restoreproduct', 'as'=>'admin_restore_product']);
    Route::post('/product/img', ['uses'=>'Admin\AdminProductController@img', 'as'=>'admin_delete_img']);

    //Маршруты для заказов
    Route::get('/orders/show', ['uses'=>'Admin\AdminOrderController@show_orders', 'as'=>'admin_show_orders']);
    Route::post('/order/change_status/{id}', ['uses'=>'Admin\AdminOrderController@change_status', 'as'=>'admin_change_status_order']);
    Route::get('/order/edit/{id}', ['uses'=>'Admin\AdminOrderController@show_editorder', 'as'=>'admin_edit_order_show']);
    Route::post('/order/edit/{id}', ['uses'=>'Admin\AdminOrderController@editorder', 'as'=>'admin_edit_order']);

    //Маршруты для настроек
    Route::get('/settings/show', ['uses'=>'Admin\AdminSettingsController@show', 'as'=>'admin_show_settings']);
    Route::post('/settings/change', ['uses'=>'Admin\AdminSettingsController@change', 'as'=>'admin_change_settings']);
    Route::post('/settings/slider-add', ['uses'=>'Admin\AdminSettingsController@addslider', 'as'=>'admin_settings_add']);
    Route::get('/settings/slider-show', ['uses'=>'Admin\AdminSettingsController@showslider', 'as'=>'admin_settings_show']);
    Route::get('/settings/slider-showedit{id}', ['uses'=>'Admin\AdminSettingsController@editslidershow', 'as'=>'admin_settings_showedit']);
    Route::get('/settings/slider-del{id}', ['uses'=>'Admin\AdminSettingsController@deleteslider', 'as'=>'admin_settings_del']);
    Route::post('/settings/slider-edit{id}', ['uses'=>'Admin\AdminSettingsController@editslider', 'as'=>'admin_settings_edit']);

    //Маршруты для гостевой книги
    Route::get('/guests/show', ['uses'=>'Admin\AdminGuestController@show', 'as'=>'admin_show_guests']);

    //Маршруты для настройки страниц
    Route::get('/pages/show/{id}', ['uses'=>'Admin\AdminPageController@show', 'as'=>'admin_show_page']);
    Route::post('/pages/change/{id}', ['uses'=>'Admin\AdminPageController@change', 'as'=>'admin_change_page']);
});