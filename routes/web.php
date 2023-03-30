<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){

    /*
    *    Rota Permissions Perfil
    */
    Route::post('perfil/{id}/permission/create', 'ACL\PermissionProfileController@vincularPermissionProfile')->name('perfil.permission.attach');
    Route::get('perfil/{id}/permission/create', 'ACL\PermissionProfileController@permissionAvailable')->name('perfil.permission.available');
    //Route::any('permission/search', 'ACL\PermissionController@search')->name('permissionperfil.search'); seria o filtro mas não acho necessário
    Route::get('perfil/{id}/permission', 'ACL\PermissionProfileController@permission')->name('perfil.permission');

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


Route::get('/', function () {
    return view('welcome');
});


/*
*    Auth Routes
*/
Auth::routes();

