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
  if (!Schema::hasTable('records')) {
      Schema::create('records', function($table){
             $table->engine = 'InnoDB';
             $table->increments('id');
             $table->string('name', 40);
             $table->string('number', 40);
             $table->string('products', 40);
     });
  }
    return view('welcome');
});
Route::get('/sales', function () {
  if (!Schema::hasTable('records')) {
      Schema::create('records', function($table){
             $table->engine = 'InnoDB';
             $table->increments('id');
             $table->string('name', 40);
             $table->string('number', 40);
             $table->string('products', 40);
     });
  }
  $petani = DB::table('records')->get();
    return view('sales', ['petani' => $petani]);
});
Route::get('/product', function () {
    if (!Schema::hasTable('product')) {
        Schema::create('product', function($table){
               $table->engine = 'InnoDB';
               $table->increments('id');
               $table->string('name', 40);
               $table->string('price', 40);
       });
    }
    $petani = DB::table('product')->get();
    return view('product' , ['petani' => $petani]);
});

use app\Http\Controllers\UserController;
Route::get('/insert','newprodon@insertform');
Route::post('/create','newprodon@insert');
Route::get('/insert','finalbuy@insertform');
Route::post('/final','finalbuy@insert');
Route::get('delete-records','delpro@index');
Route::post('delete/{id}','delpro@destroy');

Route::get('/', 'productfon@index');
Route::get('/getUsers/{id}','productfon@getUsers');
