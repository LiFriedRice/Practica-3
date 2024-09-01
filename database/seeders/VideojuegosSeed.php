<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VideojuegosSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $videojuegos = [
            ['titulo' => 'The Legend of Zelda: Breath of the Wild',
            'genero' => 'Aventura, Acción',
            'plataforma' => 'Nintendo Switch',
            'precio' => 59.99,
            'descripcion' => 'Un juego de aventura y acción en un mundo abierto vasto y detallado.',
            'clasificacion' => 'E',
            'editor' => 'Nintendo',
            'estado' => 1       
            ],
            ['titulo' => 'Red Dead Redemption 2',
            'genero' => 'Acción, Aventura',
            'plataforma' => 'PlayStation 4, Xbox One, PC',
            'precio' => 39.99,
            'descripcion' => 'Un juego de acción y aventura en el Lejano Oeste.',
            'clasificacion' => 'R',
            'editor' => 'Rockstar Games',
            'estado' => 1 
            ]
        ];
        foreach ($videojuegos as $videojuego) {
            \App\Models\Videojuegos::create($videojuego);
        }
        Model::unguard();

    }
}
