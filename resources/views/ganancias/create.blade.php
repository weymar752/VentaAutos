@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
	<h1 class="section-title">Crear ganancia</h1>
	<a class="btn-ghost" href="{{ route('ganancias.index') }}">Volver</a>
</div>

<div class="card-panel p-6 sm:p-8">
	<form class="space-y-4" method="POST" action="{{ route('ganancias.store') }}">
		@csrf
		<div class="grid gap-4 sm:grid-cols-2">
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">PPTO (ganancia)</label>
				<input name="PPTO" type="number" step="0.01" class="input-field @error('PPTO') border-red-300 ring-red-200 @enderror" value="{{ old('PPTO') }}" required>
				@error('PPTO')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Periodo (año)</label>
				<input name="Periodo" class="input-field @error('Periodo') border-red-300 ring-red-200 @enderror" value="{{ old('Periodo') }}" placeholder="2015" required>
				@error('Periodo')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Mes</label>
				<select name="Mes" class="input-field @error('Mes') border-red-300 ring-red-200 @enderror" required>
					<option value="">Seleccione mes</option>
					@foreach([1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre'] as $num=>$mes)
						<option value="{{ $num }}" @selected(old('Mes') == $num)>{{ $mes }}</option>
					@endforeach
				</select>
				@error('Mes')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div class="space-y-1">
				<label class="text-sm font-semibold text-slate-700">Sede</label>
				<select name="ID_Sede" class="input-field @error('ID_Sede') border-red-300 ring-red-200 @enderror" required>
					<option value="">Seleccione sede</option>
					@foreach($sedes as $sede)
						<option value="{{ $sede->ID_Sede }}" @selected(old('ID_Sede') == $sede->ID_Sede)>
							{{ $sede->NombreSede }} ({{ $sede->Ubicacion_Sede }})
						</option>
					@endforeach
				</select>
				@error('ID_Sede')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
		</div>

		<div class="pt-2">
			<button class="btn-primary" type="submit">Guardar ganancia</button>
		</div>
	</form>
</div>
@endsection
