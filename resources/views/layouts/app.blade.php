<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Venta de Autos' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen relative overflow-hidden">
        <nav class="relative z-10 border-b border-emerald-100 bg-white/80 backdrop-blur">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-lg font-semibold text-emerald-700">
                    <span class="grid h-10 w-10 place-items-center rounded-xl bg-emerald-600 text-white shadow-md shadow-emerald-200">VA</span>
                    <span>VentaAutos</span>
                </a>
                @if(session('vendedor_id'))
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-slate-600">{{ session('vendedor_nombre') }}</span>
                        <form method="POST" action="{{ route('vendedor.logout') }}">
                            @csrf
                            <button class="btn-ghost" type="submit">Cerrar sesión</button>
                        </form>
                    </div>
                @endif
            </div>
        </nav>

        <main class="relative z-10 mx-auto max-w-6xl px-4 py-8 space-y-4">
            @if(session('status'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
