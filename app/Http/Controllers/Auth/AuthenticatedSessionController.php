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
        $request->authenticate();


        if($request->user()->role === 'admin'){
            $request->session()->regenerate();

            $notification = array(
                'message' => 'Admin Login Successfully!',
                'alert-type' => 'success'
            );
        return redirect()->intended(route('dashboard', absolute: false))->with($notification);
        
        } elseif($request->user()->role === 'student'){
            $notification = array(
                'message' => 'Sorry! You are not an Admin',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        
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
