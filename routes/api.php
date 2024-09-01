<?php

use App\Http\Controllers\VideojuegoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Gestion de Videojuegos*/
// mostrar el listado de videojuegos definido en el controlador de videojuegos
Route ::get('/MostrarVideojuegos',[VideojuegoController::class, 'listadoVideojuegos']);
// guardar videojuegos
Route ::post('/saveVideojuego',[VideojuegoController::class, 'guardarVideojuego']);
// buscar videojuego
Route ::get('/findVideojuego/{codigo_videojuego}',[VideojuegoController::class, 'buscarVideojuego']);
// actualizar videojuego
Route ::put('/updateVideojuego/{codigo_videojuego}',[VideojuegoController::class, 'actualizarVideojuego']);
// eliminar videojuego
Route ::put('/deletevideojuego/{codigo_videojuego}',[VideojuegoController::class, 'eliminarVideojuego']);
/* Gestion de Videojuegos*/

