<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){


     /*
    *    Rota Produtos
    */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

     /*
    *    Rota Categorias
    */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');


     /*
    *    Rota Users
    */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');




    /*
    *    Rota Plans x Perfil
    */
    Route::get('plans/{id}/profiles/{idprofile}/detach', 'ACL\PlanProfileController@desvincularProfilesPlan')->name('plans.profiles.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@vincularProfilesPlan')->name('plans.profiles.attach');
    Route::get('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    //Route::any('permission/search', 'ACL\PermissionController@search')->name('permissionperfil.search'); seria o filtro mas não acho necessário
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

    /*
    *    Rota Permissions x Perfil
    */
    Route::get('perfil/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@desvincularPermissionProfile')->name('profiles.permission.detach');
    Route::post('perfil/{id}/permission', 'ACL\PermissionProfileController@vincularPermissionProfile')->name('profiles.permission.attach');
    Route::get('perfil/{id}/permission/create', 'ACL\PermissionProfileController@permissionAvailable')->name('perfil.permission.available');
    //Route::any('permission/search', 'ACL\PermissionController@search')->name('permissionperfil.search'); seria o filtro mas não acho necessário
    Route::get('perfil/{id}/permission', 'ACL\PermissionProfileController@permission')->name('perfil.permission');
    Route::get('perfil/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permission.profiles');

    /*
    *    Rota Permissions
    */
    
    Route::any('permission/search', 'ACL\PermissionController@search')->name('permission.search');
    Route::resource('permission', 'ACL\PermissionController');
    /*
    *    Rota Profiles
    */
    Route::any('perfil/search', 'ACL\ProfileController@search')->name('perfil.search');
    Route::resource('perfil', 'ACL\ProfileController');

    /*
    *    Rota DetailsPlanos
    */

    Route::get('planos/{id}/details/create', 'DetailPlanController@create')->name('details.planos.create');
    Route::delete('planos/{id}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.planos.delete');
    Route::get('planos/{id}/details/{idDetail}', 'DetailPlanController@show')->name('details.planos.show');
    //Route::get('planos/{id}/details/create', 'DetailPlanController@create')->name('details.planos.create'); pq a ordem importa tanto aqui?
    Route::put('planos/{id}/details/{idDetail}', 'DetailPlanController@update')->name('details.planos.update');
    Route::get('planos/{id}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.planos.edit');
    Route::post('planos/{id}/details/store', 'DetailPlanController@store')->name('details.planos.store');
    Route::get('planos/{id}/details', 'DetailPlanController@index')->name('details.planos.index');

    /*
    *    Rota dos Planos
    */
    Route::put('planos/update/{id}', 'PlanController@update')->name('planos.update');
    Route::get('planos/create', 'PlanController@create')->name('planos.create');
    Route::get('planos/edit/{id}', 'PlanController@edit')->name('planos.edit');
    Route::any('planos/search', 'PlanController@search')->name('planos.search');
    Route::delete('planos/delete/{id}', 'PlanController@destroy')->name('planos.delete');
    Route::get('planos/{id}', 'PlanController@show')->name('planos.show');
    Route::post('planos/store', 'PlanController@store')->name('planos.store');

    Route::get('planos', 'PlanController@index')->name('planos.index');
    /*
    *    Home / Dashboard
    */
    Route::get('/', 'PlanController@index')->name('admin.index');

    //Essas rotas eram: admin/planos/...    Admin/PlanController@funcao
});

    /*
    *    Site 
    */
    Route::get('/plan/{id}', 'Site\SiteController@plan')->name('plan.subscription');
    Route::get('/', 'Site\SiteController@index')->name('site.home');

/*
*    Auth Routes
*/
Auth::routes();

