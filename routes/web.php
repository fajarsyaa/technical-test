<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleHiistoryController;
use App\Http\Controllers\VehicleOrderController;
use App\Http\Controllers\VehicleServiceController;
use App\Models\Mine;
use App\Models\Vehicle;
use App\Models\VehicleService;
use App\Models\VehicleUseHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('/');

Auth::routes();

Route::resource('vehicle-order', VehicleOrderController::class)->middleware('auth');
Route::resource('vehicle', VehicleController::class)->middleware('auth');

Route::get('vehicle-rjct', [VehicleOrderController::class, 'rejectBySupperior'])->middleware('auth')->name('v-reject-bySupperior');
Route::get('vehicle-acc', [VehicleOrderController::class, 'approvedBySupperior'])->middleware('auth')->name('v-acc-bySupperior');

Route::get('vehicle-finish-order/{id}', [VehicleOrderController::class, 'finishOrder'])->middleware('auth')->name('v-finish');
Route::get('vehicle-is-finish/{id}', [VehicleController::class, 'serviceFinish'])->middleware('auth')->name('vehicle.finish');
Route::get('vehicle-is-service', [VehicleController::class, 'vehicleService'])->middleware('auth')->name('vehicleService');

Route::post('vehicle-history', [VehicleHiistoryController::class, 'create'])->middleware('auth')->name('v-history.create');
Route::get('vehicle-history', [VehicleHiistoryController::class, 'index'])->middleware('auth')->name('v-history.index');
Route::get('vehicle-history-report-day', [VehicleHiistoryController::class, 'exportWeeklyExcel'])->middleware('auth')->name('v-history.exportWeekExcel');
Route::get('vehicle-history-report-mont', [VehicleHiistoryController::class, 'exportMontlyExcel'])->middleware('auth')->name('v-history.exportMontExcel');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::put('/vehicle-order/{id}/mdr', [VehicleOrderController::class, 'approveMdr'])->middleware('auth')->name('vehicle-order.mdr');
Route::put('/vehicle-order/{id}/spv', [VehicleOrderController::class, 'approveSpv'])->middleware('auth')->name('vehicle-order.spv');
Route::put('/vehicle-order/{id}/hrd', [VehicleOrderController::class, 'approveHrd'])->middleware('auth')->name('vehicle-order.hrd');
