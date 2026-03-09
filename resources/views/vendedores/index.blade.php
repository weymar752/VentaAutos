@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="section-title">Vendedores</h1>
    <a class="btn-primary" href="{{ route('vendedores.create') }}">Nuevo vendedor</a>
</div>

<div class="card-panel">
    <div class="overflow-hidden rounded-2xl ring-1 ring-emerald-100">
        <table class="table-shell">
            <thead>
                <tr class="table-head">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Sede</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-50 bg-white/70">
                @forelse($vendedores as $vendedor)
                    <tr class="hover:bg-emerald-50/60 transition">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $vendedor->Id_Vendedor }}</td>
                        <td class="px-4 py-3">{{ $vendedor->Nombre }} {{ $vendedor->Apellido }}</td>
                        <td class="px-4 py-3">{{ $vendedor->Email }}</td>
                        <td class="px-4 py-3">{{ $vendedor->ID_Sede }}</td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn-ghost" href="{{ route('vendedores.edit', $vendedor->Id_Vendedor) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">No hay vendedores cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($vendedores->hasPages())
        <div class="border-t border-emerald-100 bg-white/80 px-4 py-3">{{ $vendedores->links() }}</div>
    @endif
</div>
@endsection
