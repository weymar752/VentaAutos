<?php

namespace App\Http\Controllers;

use App\Models\GananciaM;
use App\Models\Sede;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GananciaController extends Controller
{
    public function index(): View
    {
        $ganancias = GananciaM::orderBy('Periodo', 'desc')->orderBy('Mes', 'desc')->paginate(20);

        return view('ganancias.index', compact('ganancias'));
    }

    public function create(): View
    {
        $sedes = Sede::orderBy('NombreSede')->get();

        return view('ganancias.create', compact('sedes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'PPTO' => ['required', 'numeric', 'min:0'],
            'Periodo' => ['required', 'string', 'max:50'],
            'Mes' => ['required', 'integer', 'between:1,12'],
            'ID_Sede' => ['required', 'exists:sedes,ID_Sede'],
        ]);

        GananciaM::create($data);

        return redirect()->route('ganancias.index')->with('status', 'Ganancia creada.');
    }

    public function edit(GananciaM $ganancia): View
    {
        $sedes = Sede::orderBy('NombreSede')->get();

        return view('ganancias.edit', compact('ganancia', 'sedes'));
    }

    public function update(Request $request, GananciaM $ganancia): RedirectResponse
    {
        $data = $request->validate([
            'PPTO' => ['required', 'numeric', 'min:0'],
            'Periodo' => ['required', 'string', 'max:50'],
            'Mes' => ['required', 'integer', 'between:1,12'],
            'ID_Sede' => ['required', 'exists:sedes,ID_Sede'],
        ]);

        $ganancia->update($data);

        return redirect()->route('ganancias.index')->with('status', 'Ganancia actualizada.');
    }
}
