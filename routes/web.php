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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/explorer', 'ExplorerController@index')->name('explorer');
    Route::post('/explorer/{mapId}', 'ExplorerController@travel')->name('travel');
    Route::post('/battle/{respawnId}', 'ExplorerController@battle')->name('pve-battle');
    Route::post('/revive', 'UsersController@revive')->name('revive');

    Route::get('/quests', 'QuestsController@index')->name('quests');
    Route::get('/arsenal', 'ArsenalController@index')->name('arsenal');
    Route::get('/skills', 'SkillsController@index')->name('skills');
    Route::get('/inventory', 'InventoryController@index')->name('inventory');
});

