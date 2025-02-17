<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CallLogsController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/staff', [DashboardController::class, 'staff'])->name('dashboard.staff');
        // Route::get('/create', [ContractorController::class, 'create'])->name('contractors.create');
        // Route::post('/store', [ContractorController::class, 'store'])->name('contractors.store');
        // Route::get('/edit/{id}', [ContractorController::class, 'edit'])->name('contractors.edit');
        // Route::post('/update/{id}', [ContractorController::class, 'update'])->name('contractors.update');
        // Route::get('/destroy/{id}', [ContractorController::class, 'destroy'])->name('contractors.delete');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/store', [UsersController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    });

    Route::group(['prefix' => '/buildings'], function () {
        Route::get('/', [BuildingController::class, 'index'])->name('buildings.index');
        Route::get('/create', [BuildingController::class, 'create'])->name('buildings.create');
        Route::post('/store', [BuildingController::class, 'store'])->name('buildings.store');
        Route::get('/edit/{id}', [BuildingController::class, 'edit'])->name('buildings.edit');
        Route::post('/update/{id}', [BuildingController::class, 'update'])->name('buildings.update');
        Route::get('/destroy/{id}', [BuildingController::class, 'destroy'])->name('buildings.delete');
        Route::get('/get-contractors', [BuildingController::class, 'getContractors']);
    });

    Route::group(['prefix' => '/call-logs'], function () {
        Route::get('/', [CallLogsController::class, 'index'])->name('call-logs.index');
        Route::get('/create', [CallLogsController::class, 'create'])->name('call-logs.create');
        Route::post('/store', [CallLogsController::class, 'store'])->name('call-logs.store');
        Route::get('/edit/{id}', [CallLogsController::class, 'edit'])->name('call-logs.edit');
        Route::post('/update/{id}', [CallLogsController::class, 'update'])->name('call-logs.update');
        Route::get('/destroy/{id}', [CallLogsController::class, 'destroy'])->name('call-logs.delete');
        Route::get('/signature/{token}', [CallLogsController::class, 'signature'])->name('call-logs.signature');
        Route::post('/signature/store/token', [CallLogsController::class, 'signatureUpdate'])->name('signature.store');
    });

    Route::group(['prefix' => '/contractors'], function () {
        Route::get('/', [ContractorController::class, 'index'])->name('contractors.index');
        Route::get('/create', [ContractorController::class, 'create'])->name('contractors.create');
        Route::post('/store', [ContractorController::class, 'store'])->name('contractors.store');
        Route::get('/edit/{id}', [ContractorController::class, 'edit'])->name('contractors.edit');
        Route::post('/update/{id}', [ContractorController::class, 'update'])->name('contractors.update');
        Route::get('/destroy/{id}', [ContractorController::class, 'destroy'])->name('contractors.delete');
    });

    Route::group(['prefix' => '/managers'], function () {
        Route::get('/', [ManagersController::class, 'index'])->name('managers.index');
        Route::get('/create', [ManagersController::class, 'create'])->name('managers.create');
        Route::post('/store', [ManagersController::class, 'store'])->name('managers.store');
        Route::get('/edit/{id}', [ManagersController::class, 'edit'])->name('managers.edit');
        Route::post('/update/{id}', [ManagersController::class, 'update'])->name('managers.update');
        Route::get('/destroy/{id}', [ManagersController::class, 'destroy'])->name('managers.delete');
    });

    Route::group(['prefix' => '/reports'], function () {
        Route::get('/', [ReportsController::class, 'index'])->name('reports.index');
        Route::get('/export/pdf', [ReportsController::class, 'exportPDF'])->name('reports.export.pdf');
    });
});

require __DIR__ . '/auth.php';
