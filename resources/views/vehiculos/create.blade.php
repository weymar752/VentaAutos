@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
	<h1 class="section-title">Crear vehículo</h1>
	<a class="btn-ghost" href="{{ route('vehiculos.index') }}">Volver</a>
</div>

<div class="card-panel p-6 sm:p-8">
	<form class="space-y-4" method="POST" action="{{ route('vehiculos.store') }}">
		@csrf
		<div class="grid gap-4 sm:grid-cols-2">
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Año</label>
				<input name="AnioVehiculo" type="number" class="input-field @error('AnioVehiculo') border-red-300 ring-red-200 @enderror" value="{{ old('AnioVehiculo') }}" placeholder="2024" required>
				@error('AnioVehiculo')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Modelo</label>
				<select name="Id_Modelo" class="input-field @error('Id_Modelo') border-red-300 ring-red-200 @enderror" required>
					<option value="">Seleccione modelo</option>
					@foreach($modelos as $modelo)
						<option value="{{ $modelo->Id_Modelo }}" @selected(old('Id_Modelo') == $modelo->Id_Modelo)>
							{{ $modelo->Marca_Vehiculo }} · {{ $modelo->Nombre_Modelo }}
						</option>
					@endforeach
				</select>
				@error('Id_Modelo')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Vendedor</label>
				<select name="Id_Vendedor" class="input-field @error('Id_Vendedor') border-red-300 ring-red-200 @enderror" required>
					<option value="">Seleccione vendedor</option>
					@foreach($vendedores as $vendedor)
						<option value="{{ $vendedor->Id_Vendedor }}" @selected(old('Id_Vendedor') == $vendedor->Id_Vendedor)>
							{{ $vendedor->Nombre }} {{ $vendedor->Apellido }}
						</option>
					@endforeach
				</select>
				@error('Id_Vendedor')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
		</div>

		<div class="pt-2">
			<button class="btn-primary" type="submit">Guardar vehículo</button>
		</div>
	</form>
</div>
@endsection
