@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="section-title">Ganancias</h1>
    <a class="btn-primary" href="{{ route('ganancias.create') }}">Nuevo registro</a>
</div>

<div class="card-panel">
    <div class="overflow-hidden rounded-2xl ring-1 ring-emerald-100">
        <table class="table-shell">
            <thead>
                <tr class="table-head">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Periodo</th>
                    <th class="px-4 py-3">Mes</th>
                    <th class="px-4 py-3">PPTO (ganancia)</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-50 bg-white/70">
                @forelse($ganancias as $ganancia)
                    <tr class="hover:bg-emerald-50/60 transition">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $ganancia->Id_Informe_Ganancia }}</td>
                        <td class="px-4 py-3">{{ $ganancia->Periodo }}</td>
                        <td class="px-4 py-3">{{ $ganancia->Mes }}</td>
                        <td class="px-4 py-3 font-semibold text-emerald-700">${{ number_format($ganancia->PPTO, 2) }}</td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn-ghost" href="{{ route('ganancias.edit', $ganancia->Id_Informe_Ganancia) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">No hay registros de ganancias.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($ganancias->hasPages())
        <div class="border-t border-emerald-100 bg-white/80 px-4 py-3">{{ $ganancias->links() }}</div>
    @endif
</div>
@endsection
