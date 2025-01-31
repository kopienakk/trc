<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Memastikan proses autentikasi berhasil

        // Setelah login, tentukan role berdasarkan email
        $user = Auth::user();

        // Periksa apakah email yang login adalah admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Arahkan ke halaman dashboard admin
        } elseif ($user->role === 'alumni') {
            return redirect()->route('alumni.dashboard'); // Arahkan ke halaman dashboard alumni
        }

        // Regenerasi session untuk meningkatkan keamanan
        $request->session()->regenerate();

        // Redirect ke halaman yang seharusnya setelah login
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
