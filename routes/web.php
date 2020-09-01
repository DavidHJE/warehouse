<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'categories' => 'CategoryController',
    'materials' => 'MaterialController',
    'states' => 'StateController',
    'suppliers' => 'SupplierController',
    'warehouses' => 'WarehouseController',
]);

// Route::get('/materials', null)->name('/materiels');
// Route::get('/states', null)->name('/etats');
// Route::get('/category', null)->name('/categorie');
// Route::get('/warehouse', null)->name('/entrepot');
