<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Cualquiera puede entrar sin iniciar sesión)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/Nosotros', function () {
    return view('Nosotros');
})->name('Nosotros');

Route::get('/Contacto', function () {
    return view('Contacto');
})->name('Contacto');

Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (Solo entran los que ya hicieron Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
  // Redirigir al inicio después de loguearse
    Route::get('/dashboard', function () {
        return redirect('/'); 
    })->name('dashboard');

    // Rutas del Perfil de usuario (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ----- TUS RUTAS DE CLIENTES -----
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

    // ----- TUS RUTAS DE PRODUCTOS -----
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

});

// Carga las rutas de login y registro que genera Breeze
require __DIR__.'/auth.php';