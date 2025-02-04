<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AlumniAuth;

class LoginController extends Controller
{
    public function     login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah email ada di tabel tbl_alumni
        $alumni = AlumniAuth::where('email', $credentials['email'])->first();

        if (!$alumni || !Hash::check($credentials['password'], $alumni->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }

        // Login user
        Auth::login($alumni);

        return redirect()->route('alumni.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
