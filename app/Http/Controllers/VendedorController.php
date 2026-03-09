<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Models\Sede;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function index(): View
    {
        $vendedores = Vendedor::orderBy('Id_Vendedor')->paginate(20);

        return view('vendedores.index', compact('vendedores'));
    }

    public function create(): View
    {
        $sedes = Sede::orderBy('NombreSede')->get();

        return view('vendedores.create', compact('sedes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'Nombre' => ['required', 'string', 'max:120'],
            'Apellido' => ['required', 'string', 'max:150'],
            'Email' => ['required', 'email', 'max:150', 'unique:vendedores,Email'],
            'Password' => ['required', 'string', 'min:6'],
            'FechaNacimiento' => ['nullable', 'date'],
            'FotoVendedor' => ['nullable', 'string', 'max:255'],
            'ID_Sede' => ['required', 'exists:sedes,ID_Sede'],
        ]);

        $data['Password'] = Hash::make($data['Password']);

        Vendedor::create($data);

        return redirect()->route('vendedores.index')->with('status', 'Vendedor creado.');
    }

    public function edit(Vendedor $vendedor): View
    {
        $sedes = Sede::orderBy('NombreSede')->get();

        return view('vendedores.edit', compact('vendedor', 'sedes'));
    }

    public function update(Request $request, Vendedor $vendedor): RedirectResponse
    {
        $data = $request->validate([
            'Nombre' => ['required', 'string', 'max:120'],
            'Apellido' => ['required', 'string', 'max:150'],
            'Email' => ['required', 'email', 'max:150', 'unique:vendedores,Email,' . $vendedor->Id_Vendedor . ',Id_Vendedor'],
            'Password' => ['nullable', 'string', 'min:6'],
            'FechaNacimiento' => ['nullable', 'date'],
            'FotoVendedor' => ['nullable', 'string', 'max:255'],
            'ID_Sede' => ['required', 'exists:sedes,ID_Sede'],
        ]);

        if (!empty($data['Password'])) {
            $data['Password'] = Hash::make($data['Password']);
        } else {
            unset($data['Password']);
        }

        $vendedor->update($data);

        return redirect()->route('vendedores.index')->with('status', 'Vendedor actualizado.');
    }
}
