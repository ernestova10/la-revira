@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen">
    
    <div class="flex flex-col items-center">

        <title>Registrar - Sevilla</title>
        <section class="w-full bg-[#171E38] py-0 leading-[0] overflow-hidden">
            <img src="{{ asset('img/ElCerroSignUp.jpg') }}" 
                alt="El Cerro" 
                class="w-full h-[55vh] object-cover object-[center_30%] opacity-50 block">
        </section>

        {{-- Formulario de Registro --}}
        <div class="w-full max-w-md py-12 px-6">
            <h2 class="text-center text-[#171E38] font-bold uppercase tracking-[0.3em] text-2xl mb-10">
                Registro
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-5 pb-20">
                @csrf

                <div>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                        placeholder="NOMBRE"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <input id="email" type="email" name="email" :value="old('email')" required 
                        placeholder="CORREO ELECTRÓNICO"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder="CONTRASEÑA"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                        placeholder="CONFIRMAR CONTRASEÑA"
                        class="w-full bg-[#D9D9D9] border-none py-4 px-6 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#171E38] font-semibold text-sm">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col items-center space-y-6 mt-10">
                    <button type="submit" class="bg-[#171E38] text-white px-16 py-3 font-bold uppercase tracking-[0.2em] hover:bg-slate-800 transition-all shadow-lg">
                        REGISTRARSE
                    </button>

                    <a href="{{ route('login') }}" class="text-[11px] font-bold uppercase tracking-widest text-gray-500 hover:text-[#171E38] transition-colors">
                        ¿Ya tienes cuenta? Inicia sesión
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection