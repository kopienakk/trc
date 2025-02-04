<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AlumniAuth; // Gunakan AlumniAuth

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
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
    
        if ($alumni->role == 'admin') {
            // dd(auth()->user());
            return redirect()->route('admin.dashboard'); 
        } else {
            // dd(auth()->user());
            return redirect()->route('alumni.dashboard');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
