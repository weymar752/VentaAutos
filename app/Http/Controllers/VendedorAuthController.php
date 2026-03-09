<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VendedorAuthController extends Controller
{
    public function showLoginForm(Request $request): View|RedirectResponse
    {
        if ($request->session()->has('vendedor_id')) {
            return redirect()->route('dashboard');
        }

        return view('auth.vendedor-login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $vendedor = Vendedor::where('Email', $credentials['email'])->first();

        if (!$vendedor || !Hash::check($credentials['password'], $vendedor->Password)) {
            return back()
                ->withInput(['email' => $credentials['email']])
                ->withErrors(['email' => 'Credenciales inválidas.']);
        }

        $request->session()->regenerate();
        $request->session()->put('vendedor_id', $vendedor->Id_Vendedor);
        $request->session()->put('vendedor_nombre', $vendedor->Nombre.' '.$vendedor->Apellido);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['vendedor_id', 'vendedor_nombre']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('vendedor.login');
    }
}
