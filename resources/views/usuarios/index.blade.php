@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="section-title">Usuarios</h1>
    <a class="btn-primary" href="{{ route('usuarios.create') }}">Nuevo usuario</a>
</div>

<div class="card-panel">
    <div class="overflow-hidden rounded-2xl ring-1 ring-emerald-100">
        <table class="table-shell">
            <thead>
                <tr class="table-head">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Correo</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-50 bg-white/70">
                @forelse($usuarios as $usuario)
                    <tr class="hover:bg-emerald-50/60 transition">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $usuario->id }}</td>
                        <td class="px-4 py-3">{{ $usuario->name }}</td>
                        <td class="px-4 py-3">{{ $usuario->email }}</td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn-ghost" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-slate-500">No hay usuarios cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($usuarios->hasPages())
        <div class="border-t border-emerald-100 bg-white/80 px-4 py-3">{{ $usuarios->links() }}</div>
    @endif
</div>
@endsection
