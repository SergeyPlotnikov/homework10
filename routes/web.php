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

Route::get('/', 'CurrenciesController@main');
Route::middleware('auth')->group(
    function () {
        Route::resource('currencies', 'CurrenciesController')
            ->only(['index', 'show', 'edit', 'create', 'store'])->names([
                'index' => 'currencies',
                'show' => 'show-currency',
                'edit' => 'edit-currency',
                'create' => 'add-currency',
                'store' => 'store-currency'
            ]);
    }
);
Auth::routes();

