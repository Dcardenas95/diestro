<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\InformController;
use App\Http\Controllers\VendedorController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    
    Route::prefix('/admin')->group(function() {
        Route::get('/usuarios',[UserController::class, 'index'])->name('user.index');
        Route::get('/archivo',[UserController::class, 'file'])->name('user.file');

        Route::get('/informacion/eliminar', [InformController::class, 'clear'])->name('inform.delete');
        Route::delete('/informacion/{inform}/eliminar', [InformController::class, 'deleteregister'])->name('inform.register.destroy');

        Route::get('/register', [UserController::class, 'showFormRegister'])->name('user.show.form');
        Route::post('/guardar', [UserController::class, 'storeRegisterUser'])->name('user.save');
        Route::post('/file', [UserController::class, 'fileImportUser'])->name('user.import.file');
        Route::get('/{user}/editar', [UserController::class, 'edit'])->name('user.seller.edit');
        Route::get('/informacion', [UserController::class, 'seeInform'])->name('user.see.inform');
        Route::put('/{user}/actualizar', [UserController::class, 'update'])->name('user.seller.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.seller.destroy');

        Route::get('/comisiones', [ComisionController::class, 'showComision'])->name('user.show.comision');
        Route::get('/comisiones/choose', [ComisionController::class, 'chooseComision'])->name('user.choose.comision');
        Route::post('/comisiones/choose/guardar', [ComisionController::class, 'chooseSave'])->name('comision.choose.store');
        Route::post('/comisiones/crear', [ComisionController::class, 'createComision'])->name('comision.create');

        Route::prefix('/vendedor')->group(function() {
            Route::get('/informacion', [VendedorController::class, 'seeInform'])->name('vendedor.see.inform');
        });
    
        Route::prefix('/profile')->group(function() {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

Route::post('login', [AuthenticatedSessionController::class, 'store']);

require __DIR__.'/auth.php';
