<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(){

        return view('auth.login');

    }

     // Seu método personalizado para validar login (POST)
    public function login_validar(Request $request)
    {
        // Validação dos dados recebidos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenta autenticar com as credenciais
        if (Auth::attempt($credentials)) {
            // Se autenticado, regenerar sessão para segurança
            $request->session()->regenerate();

            // Redirecionar para a rota home (ou onde quiser)
            return redirect()->intended('/dashboard');
        }

        // Se falhou a autenticação, volta para login com erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não são válidas.',
        ])->onlyInput('email');
    }

    // Construtor, mantém middleware
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
 
}
