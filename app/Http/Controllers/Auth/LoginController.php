<?php

namespace App\Http\Controllers\Auth;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleAndPermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::where('username', '=', $request->username)->where('type', '=', '2')->first();

        $role_and_permission = RoleAndPermission::first();

        if (Auth::attempt($credentials)) {

            $path = '/Dashboard/dashboard';

            if ($user) {
                $permissions = explode(', ', $role_and_permission['permission']);

                foreach ($permissions as $permission) {

                    if ($permission == 'All') {
                        continue;
                    }

                    switch ($permission) {
                        case 'Dashboard':
                            $path = '/Dashboard/dashboard';
                            break 2;
                        case 'Students':
                            $path = '/Students/students';
                            break 2;
                        case 'Grade Level':
                            $path = '/GradeLevel/grade';
                            break 2;
                        case 'Section':
                            $path = '/Section/section';
                            break 2;
                        case 'Subject':
                            $path = '/Subject/subject';
                            break 2;
                        case 'Teacher':
                            $path = '/Teacher/teacher';
                            break 2;
                        case 'Class':
                            $path = '/Class/class';
                            break 2;
                        case 'Payments':
                            $path = '/Payments/payments';
                            break 2;
                        case 'Roles And Permissions':
                            $path = '/RolesandPermissions/rolesandpermissions';
                            break 2;
                        case 'SMS Management':
                            $path = '/SMS/sms';
                            break 2;
                    }
                }
            }

            $render_message = [
                'response' => 1,
                'message' => 'Login success!',
                'path' => $path
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
