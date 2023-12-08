<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        if (Auth::user()){
            // if ($user->level == '1'){
            //     return redirect()->intended('backend/dashboard');
            // } elseif ($user->level == '2'){
            //     return redirect()->intended('beranda');
            // }

            return redirect()->intended('backend/dashboard');
        }

        return view('auth.login');
    }

    public function proses(Request $request)
    {
       $request->validate([
        'email' => 'required',
        'password' => 'required',
       ]);

       $krendensial = $request->only('email', 'password');

       if (Auth::attempt(($krendensial))){
            $request->session()->regenerate();
            $user = Auth::user();
            // if ($user->level == '1'){
            //     return redirect()->intended('backend/dashboard');
            // } elseif ($user->level == '2'){
            //     return redirect()->intended('beranda');
            // }
            
            if ($user){
                return redirect()->intended('backend/dashboard');
            }

            return redirect()->intended('/');
       }

       return back()->withErrors([
        'email' => 'Maaf email atau password anda salah',
       ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
