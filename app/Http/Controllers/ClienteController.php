<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Canal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(): View
    {
        $clientes = Cliente::orderBy('ID_Cliente')->paginate(25);

        return view('clientes.index', compact('clientes'));
    }

    public function create(): View
    {
        $canales = Canal::orderBy('Canal')->get();

        return view('clientes.create', compact('canales'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'Nombres' => ['required', 'string', 'max:150'],
            'ApellidoP' => ['required', 'string', 'max:120'],
            'ApellidoM' => ['nullable', 'string', 'max:120'],
            'Segmento' => ['nullable', 'string', 'max:120'],
            'ID_Canal' => ['required', 'exists:canales,ID_Canal'],
        ]);

        Cliente::create($data);

        return redirect()->route('clientes.index')->with('status', 'Cliente creado.');
    }

    public function edit(Cliente $cliente): View
    {
        $canales = Canal::orderBy('Canal')->get();

        return view('clientes.edit', compact('cliente', 'canales'));
    }

    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $data = $request->validate([
            'Nombres' => ['required', 'string', 'max:150'],
            'ApellidoP' => ['required', 'string', 'max:120'],
            'ApellidoM' => ['nullable', 'string', 'max:120'],
            'Segmento' => ['nullable', 'string', 'max:120'],
            'ID_Canal' => ['required', 'exists:canales,ID_Canal'],
        ]);

        $cliente->update($data);

        return redirect()->route('clientes.index')->with('status', 'Cliente actualizado.');
    }
}
