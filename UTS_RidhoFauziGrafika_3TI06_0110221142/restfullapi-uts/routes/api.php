<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// membuat endpoint pasien dan menambahkan authentication sanctum
Route::middleware('auth:sanctum')->group(function () {
    // method index untuk menampilkan seluruh pasien
    Route::get('patients', [PatientController::class, 'index']);

    // method store untuk menambahkan data pasien
    Route::post('patients', [PatientController::class, 'store']);

    // method show untuk melihat data pasien berdasarkan id yang dipilih
    Route::get('patients/{id}', [PatientController::class, 'show']);

    // method update untuk mengupdate data pasien berdasarkan id yang dipilih
    Route::put('patients/{id}', [PatientController::class, 'update']);

    // method delete untuk menghapus data pasien berdasarkan id yang dipilih
    Route::delete('patients/{id}', [PatientController::class, 'destroy']);

    // method search untuk mencari data pasien berdasarkan nama yang dicari
    Route::get('patients/search/{name}', [PatientController::class, 'search']);

    // method positive untuk menampilkan data pasien yang positive
    Route::get('patients/status/positive', [PatientController::class, 'positive']);

    // method recovered untuk menampilkan data pasien yang sembuh
    Route::get('patients/status/recovered', [PatientController::class, 'recovered']);

    // method dead untuk menampilkan data pasien yang meninggal
    Route::get('patients/status/dead', [PatientController::class, 'dead']);
});


// membuat route untuk register dan login 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
