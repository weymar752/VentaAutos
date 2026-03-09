@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="section-title">Clientes</h1>
    <a class="btn-primary" href="{{ route('clientes.create') }}">Nuevo cliente</a>
</div>

<div class="card-panel">
    <div class="overflow-hidden rounded-2xl ring-1 ring-emerald-100">
        <table class="table-shell">
            <thead>
                <tr class="table-head">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre completo</th>
                    <th class="px-4 py-3">Segmento</th>
                    <th class="px-4 py-3">Canal</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-50 bg-white/70">
                @forelse($clientes as $cliente)
                    <tr class="hover:bg-emerald-50/60 transition">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $cliente->ID_Cliente }}</td>
                        <td class="px-4 py-3">{{ $cliente->Nombres }} {{ $cliente->ApellidoP }} {{ $cliente->ApellidoM }}</td>
                            <td class="px-4 py-3">{{ $cliente->Segmento ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $cliente->ID_Canal }}</td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn-ghost" href="{{ route('clientes.edit', $cliente->ID_Cliente) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">No hay clientes cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($clientes->hasPages())
        <div class="border-t border-emerald-100 bg-white/80 px-4 py-3">{{ $clientes->links() }}</div>
    @endif
</div>
@endsection
