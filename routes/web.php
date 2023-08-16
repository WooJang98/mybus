<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dbControl;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\MonitorSearchController;
use App\Http\Controllers\ReplaySearchController;
use App\Http\Controllers\SendVrnController;
use App\Http\Controllers\SendClientController;
use App\Http\Controllers\SendTripData;
use App\Http\Controllers\CarSelectController;

Route::get('/', [DefaultController::class, 'default']);

Route::get('/searchMonitor', [CarSelectController::class, 'car_select']);
//모니터링 모드에서 고객사를 고르고 검색어를 입력해 제출할 때
Route::get('/searchReplay', [ReplaySearchController::class, 'search']);
// 모니터링 모드와 리플레이모드의 사이드바의 폼을 제출했을 때

Route::get('/sendVRN', [SendVrnController::class, 'search']);

Route::get('/sendClientMonitor', [CarSelectController::class, 'car_select']);
//고객사를 고를 때 작동

Route::get('/sendClientReplay', [SendClientController::class, 'replay_search']);

Route::get('/sendTripData', [SendTripData::class, 'search']);

?>