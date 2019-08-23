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

Route::get('/', 'HomeController@index')->name('home');

//Новости
Route::get('/news/{slug}', 'HomeController@newsPage')->name('news-page');
Route::get('/news', 'HomeController@news')->name('news');

//Полезное
Route::get('/useful/{slug}', 'HomeController@usefulPage')->name('useful-page');
Route::get('/useful', 'HomeController@useful')->name('useful');

//Контакты
Route::get('/contacts', 'HomeController@contactsPage')->name('contacts');
Route::post('/contacts', 'HomeController@feedback')->name('email');

//Страницы
Route::get('/page/{slug}', 'HomeController@page')->name('page');

//Подписка на новости
Route::post('/newsletter', 'HomeController@newsletter')->name('newsletter');
Route::get('/newsletter/{id}', 'HomeController@subscriptionDelete')->name('subscription.delete');

//Ошибка 404
Route::get('/404', 'HomeController@error404')->name('404');

Route::get('/login',  'HomeController@loginForm')->name('login');
Route::post('/login',  'HomeController@login');
Route::get('/logout', 'HomeController@logout')->name('logout');

//Продукты
Route::get('/products/{slug}', 'HomeController@product')->name('product');
Route::get('/categories/{slug}', 'HomeController@category')->name('category');
Route::post('/categories', 'HomeController@sortCatalog')->name('catalog.sort');

Route::get('search', 'HomeController@search')->name('search');


//Роуты сравнения
Route::post('/compare', 'HomeController@addToComparison')->name('add-to-comparison');
Route::get('/compare', 'HomeController@compare')->name('compare');
Route::post('/compare-remove', 'HomeController@removeFromComparison')->name('compare-remove');

Route::post('/seo', 'SEOController@update')->name('seo.update')->middleware('admin');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    //Категории
    Route::resource('/categories', 'CategoriesController');
    Route::post('/update-categories', 'CategoriesController@updateCategories');

    //Баннеры
    Route::resource('/banners', 'BannersController');

    //Ноаости
    Route::resource('/news', 'NewsController');

    //Полезное
    Route::resource('/useful', 'UsefulController');

    //Вендоры
    Route::resource('/vendors', 'VendorsController');

    //Меню
    Route::resource('/menu', 'MenuController');
    Route::post('/update-menu', 'MenuController@updateMenu');

    //Настройки
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::post('/settings-update', 'AdminController@settingsUpdate')->name('admin.settings_update');

    //Статичные странички
    Route::resource('/pages', 'PagesController');

    //Атрибуты продуктов
    Route::group(['prefix'=>'attributes'], function() {
        Route::get('/', 'AttributesController@index')->name('attributes.index');
        Route::get('/load', 'AttributesController@data')->name('attributes.data');
        Route::post('/store', 'AttributesController@store')->name('attributes.store');
        Route::put('/update', 'AttributesController@update')->name('attributes.update');
        Route::delete('/delete', 'AttributesController@destroy')->name('attributes.delete');
    });

    //Продукты
    Route::group(['prefix'=>'products'], function() {
       Route::get('/', 'ProductsController@index')->name('products.index');
       Route::get('/create', 'ProductsController@create')->name('products.create');
       Route::get('/get-attributes', 'ProductsController@getAttributes')->name('products.get_attributes');
       Route::get('/load-attributes', 'ProductsController@getAttributesValues')->name('products.load_attributes');
       Route::delete('/delete', 'ProductsController@destroy')->name('products.destroy');
       Route::post('/store', 'ProductsController@store')->name('products.store');
       Route::get('/load', 'ProductsController@loadProducts')->name('products.data');
       Route::get('/{id}/edit', 'ProductsController@edit')->name('products.edit');
       Route::put('/{id}/update', 'ProductsController@update')->name('products.update');
       Route::get('/export', 'ProductsController@export')->name('products.excel');
       Route::get('/export-empty', 'ProductsController@exportEmpty')->name('products.excel.empty');
       Route::post('/import', 'ProductsController@import')->name('products.import');
       Route::post('/import-new', 'ProductsController@importNew')->name('products.import.new');
       Route::get('/images', 'ProductsController@images')->name('products.images');
       Route::post('/uploadImages', 'ProductsController@uploadImages')->name('products.upload_images');
       Route::post('/remove-image', 'ProductsController@removeImageFromProduct');
       Route::delete('/images/delete', 'ProductsController@deleteImage')->name('products.delete_image');
    });


    //Сменить пароль
    Route::post('/change-password', 'AdminController@password')->name('admin.password');
});
