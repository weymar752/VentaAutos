<?php

namespace App\Http\Controllers;

use App\Models\ModeloVehiculo;
use App\Models\Vendedor;
use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehiculoController extends Controller
{
    public function index(): View
    {
        $vehiculos = Vehiculo::with(['modelo.tipo', 'vendedor'])
            ->orderBy('Id_Vehiculo')
            ->paginate(20);

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create(): View
    {
        $modelos = ModeloVehiculo::orderBy('Marca_Vehiculo')->orderBy('Nombre_Modelo')->get();
        $vendedores = Vendedor::orderBy('Nombre')->orderBy('Apellido')->get();

        return view('vehiculos.create', compact('modelos', 'vendedores'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'AnioVehiculo' => ['required', 'integer', 'digits:4', 'min:1900'],
            'Id_Modelo' => ['required', 'exists:modelos_vehiculo,Id_Modelo'],
            'Id_Vendedor' => ['required', 'exists:vendedores,Id_Vendedor'],
        ]);

        Vehiculo::create($data);

        return redirect()->route('vehiculos.index')->with('status', 'Vehículo creado.');
    }

    public function edit(Vehiculo $vehiculo): View
    {
        $modelos = ModeloVehiculo::orderBy('Marca_Vehiculo')->orderBy('Nombre_Modelo')->get();
        $vendedores = Vendedor::orderBy('Nombre')->orderBy('Apellido')->get();

        return view('vehiculos.edit', compact('vehiculo', 'modelos', 'vendedores'));
    }

    public function update(Request $request, Vehiculo $vehiculo): RedirectResponse
    {
        $data = $request->validate([
            'AnioVehiculo' => ['required', 'integer', 'digits:4', 'min:1900'],
            'Id_Modelo' => ['required', 'exists:modelos_vehiculo,Id_Modelo'],
            'Id_Vendedor' => ['required', 'exists:vendedores,Id_Vendedor'],
        ]);

        $vehiculo->update($data);

        return redirect()->route('vehiculos.index')->with('status', 'Vehículo actualizado.');
    }
}
