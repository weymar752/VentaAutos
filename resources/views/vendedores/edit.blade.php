@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
	<h1 class="section-title">Editar vendedor #{{ $vendedor->Id_Vendedor }}</h1>
	<a class="btn-ghost" href="{{ route('vendedores.index') }}">Volver</a>
</div>

<div class="card-panel p-6 sm:p-8">
	<form class="space-y-4" method="POST" action="{{ route('vendedores.update', $vendedor->Id_Vendedor) }}">
		@csrf
		@method('PUT')
		<div class="grid gap-4 sm:grid-cols-2">
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Nombre</label>
				<input name="Nombre" class="input-field @error('Nombre') border-red-300 ring-red-200 @enderror" value="{{ old('Nombre', $vendedor->Nombre) }}" required>
				@error('Nombre')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Apellido</label>
				<input name="Apellido" class="input-field @error('Apellido') border-red-300 ring-red-200 @enderror" value="{{ old('Apellido', $vendedor->Apellido) }}" required>
				@error('Apellido')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Correo</label>
				<input type="email" name="Email" class="input-field @error('Email') border-red-300 ring-red-200 @enderror" value="{{ old('Email', $vendedor->Email) }}" required>
				@error('Email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Contraseña (dejar en blanco para mantener)</label>
				<input type="password" name="Password" class="input-field @error('Password') border-red-300 ring-red-200 @enderror">
				@error('Password')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Fecha de nacimiento</label>
				<input type="date" name="FechaNacimiento" class="input-field @error('FechaNacimiento') border-red-300 ring-red-200 @enderror" value="{{ old('FechaNacimiento', $vendedor->FechaNacimiento) }}">
				@error('FechaNacimiento')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Foto (URL)</label>
				<input name="FotoVendedor" class="input-field @error('FotoVendedor') border-red-300 ring-red-200 @enderror" value="{{ old('FotoVendedor', $vendedor->FotoVendedor) }}" placeholder="https://...">
				@error('FotoVendedor')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
		</div>

		<div class="space-y-1">
			<label class="text-sm font-semibold text-slate-700">Sede</label>
			<select name="ID_Sede" class="input-field @error('ID_Sede') border-red-300 ring-red-200 @enderror" required>
				<option value="">Seleccione sede</option>
				@foreach($sedes as $sede)
					<option value="{{ $sede->ID_Sede }}" @selected(old('ID_Sede', $vendedor->ID_Sede) == $sede->ID_Sede)>
						{{ $sede->NombreSede }} ({{ $sede->Ubicacion_Sede }})
					</option>
				@endforeach
			</select>
			@error('ID_Sede')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
		</div>

		<div class="pt-2">
			<button class="btn-primary" type="submit">Actualizar vendedor</button>
		</div>
	</form>
</div>
@endsection
