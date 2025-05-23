<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthenticatedSessionController extends Controller
{
      /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.signin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
            
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        } catch (Exception $e) {
        Log::error('Login failed: ' . $e->getMessage());

        return back()->withErrors([
            'email' => 'Terjadi kesalahan saat mencoba login. Silakan coba lagi.',
        ])->withInput($request->only('email'));
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        try {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        } catch (Exception $e) {
            Log::error('Logout failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat logout. Silakan coba lagi.');
        }
    }
}
