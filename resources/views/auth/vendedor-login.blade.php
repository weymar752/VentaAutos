@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-lg">
    <div class="card-panel p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="section-title">Ingreso de vendedores</h1>
            <p class="text-sm text-slate-600">Usa tu correo y contraseña para entrar.</p>
        </div>
        <form method="POST" action="{{ route('vendedor.login.attempt') }}" novalidate class="space-y-4">
            @csrf
            <div class="space-y-1">
                <label class="text-sm font-semibold text-slate-700" for="email">Correo</label>
                <input type="email" class="input-field @error('email') border-red-300 ring-red-200 @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-1">
                <label class="text-sm font-semibold text-slate-700" for="password">Contraseña</label>
                <input type="password" class="input-field @error('password') border-red-300 ring-red-200 @enderror" id="password" name="password" required>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-primary w-full">Ingresar</button>
        </form>
    </div>
</div>
@endsection
