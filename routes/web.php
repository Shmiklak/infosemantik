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

//Контакты
Route::get('/contacts', 'HomeController@contactsPage')->name('contacts');
Route::post('/contacts', 'HomeController@feedback')->name('email');

//Страницы
Route::get('/page/{slug}', 'HomeController@page')->name('page');


Auth::routes(['register' => false]);

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    //Категории
    Route::resource('/categories', 'CategoriesController');
    Route::post('/update-categories', 'CategoriesController@updateCategories');

    //Баннеры
    Route::resource('/banners', 'BannersController');

    //Ноаости
    Route::resource('/news', 'NewsController');

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
});
