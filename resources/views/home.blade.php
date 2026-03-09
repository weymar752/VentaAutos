@extends('layouts.app')

@section('content')
<div class="card-panel mb-6 p-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="section-title">Venta de Autos</h1>
            <p class="text-sm text-slate-600">Bienvenido, {{ session('vendedor_nombre') }}.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('vendedores.create', [], false) ?? '#' }}" class="btn-ghost">Nuevo vendedor</a>
            <a href="{{ route('usuarios.create', [], false) ?? '#' }}" class="btn-ghost">Nuevo usuario</a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <div class="card-panel p-5 flex flex-col gap-3">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-emerald-800">Clientes</h3>
            <span class="pill-muted">CRM</span>
        </div>
        <p class="text-sm text-slate-600">Listado y gestión de clientes.</p>
        <div class="mt-auto">
            <a href="{{ route('clientes.index', [], false) ?? '#' }}" class="btn-primary w-full">Ver clientes</a>
        </div>
    </div>
    <div class="card-panel p-5 flex flex-col gap-3">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-emerald-800">Autos</h3>
            <span class="pill-muted">Stock</span>
        </div>
        <p class="text-sm text-slate-600">Catálogo de vehículos disponibles.</p>
        <div class="mt-auto">
            <a href="{{ route('vehiculos.index', [], false) ?? '#' }}" class="btn-primary w-full">Ver autos</a>
        </div>
    </div>
    <div class="card-panel p-5 flex flex-col gap-3">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-emerald-800">Ganancias</h3>
            <span class="pill-muted">Mes</span>
        </div>
        <p class="text-sm text-slate-600">Resumen de Ganancias_M.</p>
        <div class="mt-auto">
            <a href="{{ route('ganancias.index', [], false) ?? '#' }}" class="btn-primary w-full">Ver ganancias</a>
        </div>
    </div>
    <div class="card-panel p-5 flex flex-col gap-3">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-emerald-800">Vendedores</h3>
            <span class="pill-muted">Equipo</span>
        </div>
        <p class="text-sm text-slate-600">Equipo de ventas.</p>
        <div class="mt-auto space-y-2">
            <a href="{{ route('vendedores.index', [], false) ?? '#' }}" class="btn-primary w-full">Ver vendedores</a>
            <a href="{{ route('vendedores.create', [], false) ?? '#' }}" class="btn-ghost w-full">Crear vendedor</a>
        </div>
    </div>
</div>
@endsection
