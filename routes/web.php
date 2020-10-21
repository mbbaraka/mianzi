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
use App\Tracker;

Route::get('/', function () {
    
    //number of user connected or viewed
    Tracker::firstOrCreate([
        'ip'   => $_SERVER['REMOTE_ADDR']],
        ['ip'   => $_SERVER['REMOTE_ADDR'],
        'current_date' => date('Y-m-d')])->save();

    return view('home.index');
})->name('index');



    ///// Customer login, registration

    Auth::routes();

    Route::get('login.html', 'Shop\LoginController@showCustomerLogin')->name('login.html');
    Route::get('register.html', 'Shop\RegisterController@showCustomerRegisterForm')->name('register.html');

    Route::post('/login/customer', 'Shop\LoginController@customerLogin')->name('login.check');
    Route::post('/register/customer', 'Shop\RegisterController@createCustomer')->name('customer.register');


    ///////  Home routes /////////////////////////////

    //category
    Route::group(['prefix' => '/', 'namespace' => 'Shop'], function(){
        Route::get('category/{slug}.html', 'CatalogueController@index');
        Route::get('{slug}.html', 'ProductController@index');
        Route::get('/search', 'FilterController@singleSearch')->name('search');
        Route::get('/filter', 'FilterController@filterByAttribute')->name('filter');
        Route::get('shop', 'CatalogueController@allProducts')->name('shop');
        //Cart
        Route::get('cart/', 'CartController@index')->name('cart.index');
        Route::post('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
        Route::post('cart/{id}/update', 'CartController@updateCart')->name('cart.update');
        Route::get('remove-cart/{id}', 'CartController@removeCart')->name('cart.destroy');
        
        //Checkout
        Route::group(['prefix' => '/checkout', 'middleware' => 'customer'], function(){
            Route::get('', 'CheckoutController@index')->name('checkout');            
        });

        //Compare
        Route::get('add-to-compare/{id}', 'ProductController@addToCompare')->name('add-to-compare');
        Route::get('compare/{id}/destroy', 'ProductController@destoyCompare')->name('compare.destroy');
        //Wishlist
        Route::get('add-to-wishlist/{id}', 'ProductController@addToWishlist')->name('add-to-wishlist');
        Route::group(['prefix' => '/account', 'middleware' => 'customer'], function(){
            Route::get('wishlists', 'WishlistController@index')->name('wishlists');
            Route::get('wishlists/{id}/destroy', 'WishlistController@destroy')->name('wishlist.destroy');
            Route::get('compare', 'ProductController@compare')->name('compare');
            Route::get('/', 'AccountController@index')->name('dashboard');
            
        });

        //Reviews
        Route::post('reviews/add', 'ProductController@addReview')->name('review.add');


        //Site////////////////////////////////////////////////////////////////
        //Subscription
        Route::post('subscribe', 'CatalogueController@subscribe')->name('subscribe');

        //contact us
        Route::get('contact-us', 'PageController@contact')->name('contact-us');

        //faq
        Route::get('faq', 'PageController@faq')->name('faq');

        //terms-and-conditions
        Route::get('terms-and-conditions', 'PageController@termsAndConditions')->name('terms-and-conditions');

        //about us
        Route::get('about-us', 'PageController@about')->name('about-us');

        
    });














/// Administrator routes

Route::group(['middleware' => ['role:admin']], function () {
	Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::get('login-activities',[
        'as' => 'login-activities',
        'uses' => 'Admin\UsersController@indexLoginLogs'
    ]);    
});

Route::group(['middleware' => ['role:user']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile','Users\ProfileController');
    
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {


    ////// product categories and sub categories////////////////
    Route::resource('categories', 'CategoryController');
    Route::get('categories/{category}/{id}', 'CategoryController@subcategories')->name('subcategories.index');
    Route::post('subcategories/store', 'CategoryController@storeSubcategories')->name('subcategories.store');




    /////// attributes, and thier values//////////////
    Route::resource('attributes', 'AttributeController');
    Route::get('attributes/{attribute}/{id}', 'AttributeController@values')->name('value.index');
    Route::post('value/store', 'AttributeController@storeValue')->name('value.store');
    Route::get('value/destroy/{id}', 'AttributeController@destroyValue')->name('value.destroy');

    //////////////// shipping and shipping prices per pickup stations
    Route::resource('shipping', 'ShippingController');
    Route::get('shipping/{shipping}/{id}', 'ShippingController@shippingPrice')->name('shippingprice.index');
    Route::post('shipping/price/store', 'ShippingController@shippingPriceStore')->name('shippingprice.store');
    Route::get('shippings/price/{id}', 'ShippingController@shippingPriceDelete')->name('shippingprice.delete');

    //////////////// banners and collection banners
    Route::resource('banners', 'BannerController');
    // Route::get('shipping/{shipping}/{id}', 'ShippingController@shippingPrice')->name('shippingprice.index');
    // Route::post('shipping/price/store', 'ShippingController@shippingPriceStore')->name('shippingprice.store');
    // Route::get('shippings/price/{id}', 'ShippingController@shippingPriceDelete')->name('shippingprice.delete');


    /////// products and product attributes //////////////////
    Route::resource('products', 'ProductController');
    Route::get('product/image/{id}', 'ProductController@removeImage')->name('image.remove');
    Route::get('product/{id}/attributes/', 'ProductController@attributes')->name('product.attribute');
    Route::post('products/attributes/store', 'ProductController@productAttributeStore')->name('attribute-product.store');
    Route::get('products/attributes/{id}/delete', 'ProductController@productAttributeDestroy')->name('attribute-product.destroy');


    /// regions, districts, and pickup stations////////////////////////
    Route::resource('regions', 'RegionController');
    Route::get('region/{id}/districts', 'RegionController@districts')->name('districts.index');
    Route::post('region/districts/store', 'RegionController@districtStore')->name('districts.store');
    Route::get('region/district/{id}/edit', 'RegionController@districtEdit')->name('districts.edit');
    Route::post('region/district/{id}/update', 'RegionController@districtUpdate')->name('districts.update');
    Route::get('region/district/{id}/delete', 'RegionController@districtDelete')->name('districts.delete');
    Route::get('region/district/{id}/pickups/', 'RegionController@pickupStation')->name('pickupstation.index');
    Route::post('region/district/pickups/store', 'RegionController@pickupStationStore')->name('pickupstation.store');
    Route::get('region/district/pickups/{id}/delete', 'RegionController@pickupStationDelete')->name('pickupstation.delete');
    Route::get('pickup-stations', 'RegionController@pickupIndex')->name('pickupstation.list');

    /////////product orders and order statuses//////////////////////
    
    // Route::resource('gallery', 'GalleryController');
    // Route::resource('banners', 'BannerController');
    // Route::resource('sermons', 'SermonController');
    // Route::resource('events', 'EventController');
    // Route::resource('churches', 'ChurchController');
    // // Route::resource('settings', 'SettingController');
    // // Route::resource('filemanager', 'FileController');
    // // Route::resource('users', 'UsersController');
    // // Route::resource('account', 'AccountController');
    // Route::resource('subscribers', 'SubscriberController');
    // Route::resource('contacts', 'ContactController');
    // Route::resource('verses', 'VersesController');
});



Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');