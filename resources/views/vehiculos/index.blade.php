@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="section-title">Vehículos</h1>
    <a class="btn-primary" href="{{ route('vehiculos.create') }}">Nuevo vehículo</a>
</div>

<div class="card-panel">
    <div class="overflow-hidden rounded-2xl ring-1 ring-emerald-100">
        <table class="table-shell">
            <thead>
                <tr class="table-head">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Año</th>
                    <th class="px-4 py-3">Modelo</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Vendedor</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-50 bg-white/70">
                @forelse($vehiculos as $vehiculo)
                    <tr class="hover:bg-emerald-50/60 transition">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $vehiculo->Id_Vehiculo }}</td>
                        <td class="px-4 py-3">{{ $vehiculo->AnioVehiculo }}</td>
                        <td class="px-4 py-3">
                            @if($vehiculo->modelo)
                                <div class="font-semibold text-slate-800">{{ $vehiculo->modelo->Marca_Vehiculo }}</div>
                                <div class="text-sm text-slate-600">{{ $vehiculo->modelo->Nombre_Modelo }}</div>
                            @else
                                <span class="text-slate-500">Sin modelo</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            {{ $vehiculo->modelo?->tipo?->Tipo_de_Vehiculo ?? '—' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $vehiculo->vendedor?->Nombre ? $vehiculo->vendedor->Nombre . ' ' . $vehiculo->vendedor->Apellido : '—' }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn-ghost" href="{{ route('vehiculos.edit', $vehiculo->Id_Vehiculo) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">No hay vehículos cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($vehiculos->hasPages())
        <div class="border-t border-emerald-100 bg-white/80 px-4 py-3">{{ $vehiculos->links() }}</div>
    @endif
</div>
@endsection
