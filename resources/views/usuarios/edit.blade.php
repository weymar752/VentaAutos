@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
	<h1 class="section-title">Editar usuario #{{ $usuario->id }}</h1>
	<a class="btn-ghost" href="{{ route('usuarios.index') }}">Volver</a>
</div>

<div class="card-panel p-6 sm:p-8">
	<form class="space-y-4" method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
		@csrf
		@method('PUT')
		<div class="grid gap-4 sm:grid-cols-2">
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Nombre</label>
				<input name="name" class="input-field @error('name') border-red-300 ring-red-200 @enderror" value="{{ old('name', $usuario->name) }}" required>
				@error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Correo</label>
				<input type="email" name="email" class="input-field @error('email') border-red-300 ring-red-200 @enderror" value="{{ old('email', $usuario->email) }}" required>
				@error('email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1 sm:col-span-2">
				<label class="text-sm font-semibold text-slate-700">Contraseña (dejar en blanco para mantener)</label>
				<input type="password" name="password" class="input-field @error('password') border-red-300 ring-red-200 @enderror">
				@error('password')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
		</div>

		<div class="pt-2">
			<button class="btn-primary" type="submit">Actualizar usuario</button>
		</div>
	</form>
</div>
@endsection
