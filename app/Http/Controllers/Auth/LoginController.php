<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
        if ($request->email_username && $request->password) {
            $rules = [
                'email_username' => 'required',
                'password'       => 'required|min:6',
            ];
    
            $messages = [
                'email_username.required' => 'Kolom Email/Username wajib diisi!',
                'password.required' => 'Kolom Password wajib diisi!',
                'password.min' => 'Kolom Password minimal 6 karakter!',
            ];
    
            $this->validate($request, $rules, $messages);
    
            // $loginType = filter_var($request->email_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $loginType = 'email';
    
            $login = [
                $loginType => $request->email_username,
                'password' => $request->password
            ];
    
            if (auth()->attempt($login, false)) { 
                if (auth()->user()->hasRole('superadmin')){
                    return redirect()->intended($this->redirectPath());
                } else {
                    auth()->logout();
                    return redirect()->route('login')->with(['warning' => 'Anda tidak mempunyai akses untuk login pada web ini']);
                }
            }

            return redirect()->route('login')->with(['warning' => 'Username/Email atau Password Anda salah']);
        } else {
            return redirect()->route('login')->with(['error' => 'Lengkapi kolom Username/Email dan Password']);
        }
    }
    
}
