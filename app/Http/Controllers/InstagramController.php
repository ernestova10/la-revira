<?php

namespace App\Http\Controllers;

use App\Models\InstagramPost;
use Illuminate\Http\Request;

class InstagramController extends Controller {
    
    // Ver todos los posts
    public function index() {
        $posts = InstagramPost::latest()->get();
        return view('vidaCofrade.index', compact('posts'));
    }

    // Guardar nuevo post (Solo Admin)
    public function store(Request $request) {
        $request->validate(['url' => 'required|url']);
        InstagramPost::create(['url' => $request->url]);
        return back()->with('success', 'Post añadido correctamente');
    }

    // Borrar post (Solo Admin)
    public function destroy($id) {
        InstagramPost::findOrFail($id)->delete();
        return back()->with('success', 'Post eliminado');
    }
}
