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
Route::get('/', function () {
    return view('welcome');
});
//Route::get('country', function () { return view('vista_country'); });
Route::get('country','App\Http\Controllers\ControladorWorld@get_country')->name('country');
Route::get('eliminar','App\Http\Controllers\ControladorWorld@eliminar')->name('eliminar');
Route::get('modificar','App\Http\Controllers\ControladorWorld@modificar')->name('modificar');
Route::get('modifica_country','App\Http\Controllers\ControladorWorld@modifica_country')->name('modifica_country');
Route::get('subirfoto','App\Http\Controllers\ControladorWorld@subirfoto')->name('subirfoto');
Route::post('subirfoto2','App\Http\Controllers\ControladorWorld@subirfoto2')->name('subirfoto2');
Route::get('consultar','App\Http\Controllers\ControladorWorld@consultar')->name('consultar');
Route::get('consultar2','App\Http\Controllers\ControladorWorld@consultar2')->name('consultar2');



