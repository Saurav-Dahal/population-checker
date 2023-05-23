<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register'); 
Route::post('/auth/save',[AuthController::class, 'saveUser'])->name('auth.save');
Route::post('/auth/check',[AuthController::class, 'checkUser'])->name('auth.check');


Route::group(['middleware'=>['auth.user']], function(){
    Route::get('/auth/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/user/dashboard',[AuthController::class, 'dashboard']);
    Route::post('/get-cities',[AuthController::class,'getCities'])->name('get.cities');
    
    Route::get('/country/ajax/{country_id}', [AuthController::class, 'getCountryPop']);
    Route::get('/city/ajax/{city_id}', [AuthController::class, 'getCityPop']);
    Route::get('/gender/ajax/{city_id}/{gender_id}', [AuthController::class, 'getGenderPop']);
    Route::get('/gender/ajax/country/{country_id}/{gender_id}', [AuthController::class, 'getGenderPopByCountry']);
});