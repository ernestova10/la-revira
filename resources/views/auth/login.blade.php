@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen">

    <div class="flex flex-col items-center">

        <title>Iniciar sesión - Sevilla</title>
        <section class="w-full bg-[#171E38] py-0 leading-[0] overflow-hidden">
            <img src="{{ asset('img/sanGonzaloLogIn.jpg') }}" 
                alt="San Gonzalo" 
                class="w-full h-[55vh] object-cover object-[center_30%] opacity-50 block">
        </section>

        <div class="w-full max-w-md py-12 px-6">
            <h2 class="text-center text-[#171E38] font-bold uppercase tracking-[0.3em] text-2xl mb-10">
                Inicio de sesión
            </h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        placeholder="CORREO ELECTRÓNICO"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        placeholder="CONTRSEÑA"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-center mt-10">
                    <button type="submit" class="bg-[#171E38] text-white px-16 py-3 font-bold uppercase tracking-[0.2em] hover:bg-slate-800 transition-all shadow-lg">
                        Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection