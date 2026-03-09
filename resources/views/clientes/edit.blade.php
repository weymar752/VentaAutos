@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
	<h1 class="section-title">Editar cliente #{{ $cliente->ID_Cliente }}</h1>
	<a class="btn-ghost" href="{{ route('clientes.index') }}">Volver</a>
</div>

<div class="card-panel p-6 sm:p-8">
	<form class="space-y-4" method="POST" action="{{ route('clientes.update', $cliente->ID_Cliente) }}">
		@csrf
		@method('PUT')
		<div class="grid gap-4 sm:grid-cols-2">
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Nombres</label>
				<input name="Nombres" class="input-field @error('Nombres') border-red-300 ring-red-200 @enderror" value="{{ old('Nombres', $cliente->Nombres) }}" required>
				@error('Nombres')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Apellido paterno</label>
				<input name="ApellidoP" class="input-field @error('ApellidoP') border-red-300 ring-red-200 @enderror" value="{{ old('ApellidoP', $cliente->ApellidoP) }}" required>
				@error('ApellidoP')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Apellido materno</label>
				<input name="ApellidoM" class="input-field @error('ApellidoM') border-red-300 ring-red-200 @enderror" value="{{ old('ApellidoM', $cliente->ApellidoM) }}">
				@error('ApellidoM')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Segmento</label>
				<input name="Segmento" class="input-field @error('Segmento') border-red-300 ring-red-200 @enderror" value="{{ old('Segmento', $cliente->Segmento) }}">
				@error('Segmento')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
		</div>

		<div class="space-y-1">
			<label class="text-sm font-semibold text-slate-700">Canal</label>
			<select name="ID_Canal" class="input-field @error('ID_Canal') border-red-300 ring-red-200 @enderror" required>
				<option value="">Seleccione canal</option>
				@foreach($canales as $canal)
					<option value="{{ $canal->ID_Canal }}" @selected(old('ID_Canal', $cliente->ID_Canal) == $canal->ID_Canal)>
						{{ $canal->Canal }} ({{ $canal->TipoCanal }})
					</option>
				@endforeach
			</select>
			@error('ID_Canal')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
		</div>

		<div class="pt-2">
			<button class="btn-primary" type="submit">Actualizar cliente</button>
		</div>
	</form>
</div>
@endsection
