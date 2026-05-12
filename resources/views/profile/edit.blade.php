@extends('layouts.app') {{-- Usamos tu layout base --}}

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-12 text-center">

            <h2 class="inline-block text-3xl font-bold text-[#171E38] uppercase tracking-[0.2em] border-b-4 border-[#171E38] pb-2">
                Mi Perfil Cofrade
            </h2>
            <p class="text-gray-500 mt-4 font-medium uppercase text-xs tracking-widest">Gestiona tus datos personales y seguridad</p><br>
            <a href="{{ route('profile.purchases') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Mis Papeletas
            </a>
            <div class="mb-4">
                <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-[#171E38] hover:text-gray-600 transition-all font-bold uppercase text-xs tracking-widest group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Volver al inicio
                </a>
            </div>
        </div>

        <div class="space-y-8">
            
            <div class="bg-white shadow-md border-t-4 border-[#171E38] p-6 sm:p-10 transition-all hover:shadow-lg">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-bold text-[#171E38] uppercase mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Datos de la cuenta
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white shadow-md border-t-4 border-[#171E38] p-6 sm:p-10 transition-all hover:shadow-lg">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-bold text-[#171E38] uppercase mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Seguridad
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white shadow-md border-t-4 border-red-700 p-6 sm:p-10 transition-all hover:shadow-lg">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-bold text-red-700 uppercase mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Zona de Peligro
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
