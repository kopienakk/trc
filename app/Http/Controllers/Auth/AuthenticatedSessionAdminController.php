<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionAdminController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari pengguna di tabel `tbl_alumni` melalui model AlumniAuth
        $alumni = User::where('email', $credentials['email'])->first();

        if (!$alumni || !Hash::check($credentials['password'], $alumni->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }

        // Login user ke session
        Auth::login($alumni);

        // Redirect berdasarkan role
        if ($alumni->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($alumni->role === 'alumni') {
            return redirect()->route('alumni.dashboard');
        }

        // Jika role tidak dikenali
        return redirect()->intended(route('dashboard'));
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
