<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;


class PostController extends Controller
{
    //

    public function create()
    {
        return view('create');
    }

    public function getHome()
    {
        return view('home', ['posts' => Post::all()]);
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Solo imágenes
        ]);

        // Guardar la imagen en el almacenamiento local
        $path = $request->file('image')->store('/posts');

        // Convertir la ruta relativa en absoluta
        $absolutePath = Storage::url($path);

        // Crear el post en la base de datos
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'url_image' => $absolutePath, // Guardar la ruta absoluta
            'published_at' => now(),
            'n_likes' => 0,
            'belongs_to' => auth()->id(),
        ]);

    }
}
