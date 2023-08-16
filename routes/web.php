<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarSelectController;
use App\Http\Controllers\MonitoringVideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('test');
});*/

Route::get('/', [MainController::class, 'MainController']);
Route::get('/test',[CarSelectController::class, 'car_select']);
Route::get('/video', [MonitoringVideoController::class, 'show_today_video']);
?>
