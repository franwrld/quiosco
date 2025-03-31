<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        // Mostrar en JSON las categorias 1ra forma
        // return response()->json([
        //     'categorias' => Categoria::all()
        // ]);
        // Mostrar en JSON las categorias 2da forma
        // php artisan make:resource CategoriaResource y php artisan make:resource CategoriaCollection
        return new CategoriaCollection(Categoria::all());
    }
}
