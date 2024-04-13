<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    public function index() {
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $render_message = [
                'response' => 1,
                'message' => 'Login success!',
                'path' => '/Dashboard/dashboard'
            ];
            return response()->json($render_message);
        } else {
            $render_message = [
                'response' => 0,
                'message' => 'Invalid credentials ',
            ];
            return response()->json($render_message);
        }
    }


    public function logout()
    {
        Auth::logout();
        $render_message = [
            'response' => 1,
            'message' => 'Logout success!',
            'path' => '/'
        ];
        return response()->json($render_message);
    }


}
