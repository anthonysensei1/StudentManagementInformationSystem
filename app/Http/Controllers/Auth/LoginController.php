<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleAndPermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

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

        $user = User::select('users.*', 'teachers.*', 'teachers.id AS teachers_id')->join('teachers', 'users.user_type_id', 'teachers.id')->where('username', '=', $request->username)->where('type', '=', '2')->first();

        if (Auth::attempt($credentials)) {

            $path = '/Dashboard/dashboard';
            $request->session()->regenerate();
            $arr_sessions['permission'] = [];

            if ($user) {

                $role_and_permission = RoleAndPermission::where('id', '=', '2')->first();

                $permissions = explode(', ', $role_and_permission['permission']);

                $arr_sessions = [
                    'teachers_id' => $user->teachers_id,
                    'upload_image_name' => $user->upload_image_name,
                    'em_id' => $user->employee_id,
                    'user_name' => $user->username,
                    'address' => $user->address,
                    'b_date' => $user->b_date,
                    'gender' => $user->gender,
                    'e_address' => $user->email_add,
                    'c_number' => $user->contact_number,
                    'd_created' => $user->created_at,
                    'name' => $user->name,
                    'permission' => $permissions
                ];

                $path = $this->settingPath($permissions);
            } else {

                $registrar = User::where('username', '=', $request->username)->where('type', '=', '3')->first();
                $role_and_permission = RoleAndPermission::where('id', '=', '1')->first();

                if ($registrar) {
                    $permissions = explode(', ', $role_and_permission['permission']);

                    $arr_sessions = [
                        'permission' => $permissions
                    ];
                    $path = $this->settingPath($permissions);
                }
            }


            Session::put($arr_sessions);

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

    public function settingPath($permissions)
    {

        $path = '/Dashboard/dashboard';

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
                case 'Annual Student Roster':
                    $path = '/AnnualStudentRoster/annualstudentroster';
                    break 2;
            }
        }

        return $path;
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        $render_message = [
            'response' => 1,
            'message' => 'Logout success!',
            'path' => '/'
        ];
        return response()->json($render_message);
    }
}
