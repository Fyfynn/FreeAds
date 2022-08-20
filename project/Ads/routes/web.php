<?php

use App\Models\Ad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

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

// Route::get('/', AdController::class) 

//     return view('index');
// ;

                                            // REGISTER USER

Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'store']);


                                            // GET ALL USERS

Route::get('/users', [UserController::class, 'index']);

                                            // CONECTION USER

Route::get('/connection', [UserController::class, 'login']);

Route::post('/connection', [UserController::class, 'connect']);




                                            // ALL FCT CRUDS ADS

Route::resource('ads', AdController::class);

Route::get('/account', [AccountController::class, 'welcome']);
Route::get('/disconnect', [AccountController::class, 'disconnect']);

Route::post('/userUpdate', [UserController::class, 'update']);


Route::get('/admin', function () {
    $ads = Ad::all();
    return view('admin', compact('ads'));
});

Route::get('/search', [AdController::class, 'search']);





