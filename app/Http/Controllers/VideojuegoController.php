<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Videojuegos;

class VideojuegoController extends Controller
{
    public function listadoVideojuegos()
    {
        $videojuegos = Videojuegos::where('estado', '!=', 0)->get();
        return response()->json([
                'videojuegos' => $videojuegos,
                'status' => true
            ]);
    }
    public function guardarVideojuego(Request $request)
    {
        try {
            $videojuegos = new Videojuegos;
            $videojuegos->titulo = $request->titulo_videojuego;
            $videojuegos->genero = $request->genero_videojuego;
            $videojuegos->plataforma = $request->plataforma_videojuego;
            $videojuegos->precio = $request->precio_videojuego;
            $videojuegos->descripcion = $request->descripcion_videojuego;
            $videojuegos->clasificacion = $request->clasificacion_videojuego;
            $videojuegos->editor = $request->editor_videojuego;
            $videojuegos->estado = $request->estado_videojuego;

            $videojuegos->save(); 
            return response()->json([
                'mensaje' => 'Videojuego creado correctamente',
                'status' => true
            ]);
        }catch (Exception $e) {
            return response()->json([
                'mensaje' => 'Error en la api de guardar videojuego',
                'status' => false
            ]);

        }
    }
    public function buscarVideojuego($codigo_videojuego)
    {
            $videojuego = Videojuegos::findOrFail($codigo_videojuego);

            return response()->json([
                'videojuego_buscado' => $videojuego,
                'status'=> true
            ]);

    }
    public function actualizarVideojuego(Request $request, $codigo_videojuego)
    {
        try{
            $videojuegos = Videojuegos::findOrFail($codigo_videojuego);
        
            $videojuegos->titulo = $request->titulo_videojuego;
            $videojuegos->genero = $request->genero_videojuego;
            $videojuegos->plataforma = $request->plataforma_videojuego;
            $videojuegos->precio = $request->precio_videojuego;
            $videojuegos->descripcion = $request->descripcion_videojuego;
            $videojuegos->clasificacion = $request->clasificacion_videojuego;
            $videojuegos->editor = $request->editor_videojuego;
            $videojuegos->estado = $request->estado_videojuego;

            $videojuegos->update();
            
            return response()->json([
                'mensaje'=>'Videojuego actualizado correctamente',
                'status'=> true
            ]);
        }catch(Exception $e){
            return response()->json([
                'mensaje'=>'Error en la api de actualizar videojuego',
                'status'=> false
            ]); 
        }
    }

    public function eliminarVideojuego(Request $request, $codigo_videojuego)
    {
        try{
            $videojuegos = Videojuegos::findOrFail($codigo_videojuego);
            $videojuegos->estado = 0;

            $videojuegos->update();
            
            return response()->json([
                'mensaje'=>'Videojuego Eliminado',
                'status'=> true
            ]);
        }catch(Exception $e){
            return response()->json([
                'mensaje'=>'Error en la api de actualizar videojuego',
                'status'=> false
            ]); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
