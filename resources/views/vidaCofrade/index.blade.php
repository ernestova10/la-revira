@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    


    <div class="max-w-6xl mx-auto px-4">

        {{-- BLOQUE SOLO PARA EL ADMINISTRADOR --}}
        @can('admin')
        <div class="bg-white p-6 shadow-md border-l-4 border-[#171E38] mb-12">
            <h3 class="font-bold uppercase text-sm mb-4">Panel de Capataz: Añadir Post</h3>
            <form action="{{ route('admin.instagram.store') }}" method="POST" class="flex gap-4">
                @csrf
                <input type="text" name="url" placeholder="Pega aquí la URL de Instagram..." 
                    class="flex-grow border-gray-300 focus:ring-[#171E38] text-sm">
                <button type="submit" class="bg-[#171E38] text-white px-6 py-2 text-xs font-bold uppercase">
                    Añadir
                </button>
            </form>
        </div>
        @endcan

        {{-- GRID DE POSTS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-white p-2 shadow relative">
                    <blockquote class="instagram-media" data-instgrm-permalink="{{ $post->url }}" data-instgrm-version="14"></blockquote>
                    
                    {{-- Botón de borrar (Solo para Admin) --}}
                    @can('admin')
                        <form action="{{ route('admin.instagram.destroy', $post->id) }}" method="POST" class="mt-2 text-right">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 text-[10px] font-bold uppercase hover:underline">
                                [ Quitar Post ]
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>
</div>

<script async src="//www.instagram.com/embed.js"></script>
@endsection