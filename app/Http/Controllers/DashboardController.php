<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Models\RoleAndPermission;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!in_array('Dashboard', session('permission')) && auth()->user()->type != 1) {
            abort(404);
        }

        $currect_year = Carbon::now()->year;
        $past_year = Carbon::now()->subYear()->year;

        $students_current_year = Student::whereYear('created_at', $currect_year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get()
            ->pluck('count', 'month');

        $students_past_year = Student::whereYear('created_at', $past_year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get()
            ->pluck('count', 'month');

        $monthly_data_current = [];
        $monthly_data_past = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthly_data_current[] = $students_current_year->get($i) ?? 0;
            $monthly_data_past[] = $students_past_year->get($i) ?? 0;
        }

        $render_data = [
            'monthly_data_current' => $monthly_data_current,
            'monthly_data_past' => $monthly_data_past,
        ];

        return view('Dashboard/dashboard', $render_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid phone number!',
                'path' => '/Dashboard/dashboard'
            ]);
        }

        if (strtolower($request->gender) != 'male' && strtolower($request->gender) != 'female') {
            return response()->json([
                'response' => 0,
                'message' => 'Please input male or female only!',
                'path' => '/Dashboard/dashboard'
            ]);
        }

        $exists = Teacher::where(function ($query) use ($request) {
            $query->where('id', '!=', session('teachers_id'))
                ->where(function ($query) use ($request) {
                    $query->where('employee_id', $request->employee_id);
                });
        })->exists();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid employee id.',
                'path' => '/Dashboard/dashboard'
            ]);
        }

        $exists = User::where('username', $request->username)->where('user_type_id', '!=', session('teachers_id'))->first();
        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Username is invalid! Please use other username.',
                'path' => '/Dashboard/dashboard'
            ]);
        }

        $b_date = new DateTime($request->b_date);
        $current_date = new DateTime();
        $age = $current_date->diff($b_date)->y;

        $form_data = [
            'employee_id' => $request->employee_id,
            'address' => ucfirst($request->address),
            'contact_number' => $request->contact_number,
            'email_add' => $request->email_add,
            'b_date' => $request->b_date,
            'gender' => strtolower($request->gender) == 'male' ? 1 : 2,
            'age' => $age,
        ];

        Teacher::where('id', '=', session('teachers_id'))->update($form_data);
        $form_data = [
            'username' => $request->username,
        ];

        User::where('user_type_id', '=', session('teachers_id'))->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating success',
            'path' => '/Dashboard/dashboard'
        ];
        

        $request->session()->regenerate();
        $arr_sessions = [
            'em_id' => $request->employee_id,
            'user_name' => $request->username,
            'address' => ucfirst($request->address),
            'b_date' => $request->b_date,
            'gender' => strtolower($request->gender) == 'male' ? 1 : 2,
            'e_address' => $request->email_add,
            'c_number' => $request->contact_number,
        ];

        Session::put($arr_sessions);

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_all_permission()
    {
        $type = auth()->user()->type == 2 ? 2 : 1;

        $role_and_permission = RoleAndPermission::where('id', '=', $type)->first();
        return $role_and_permission['permission'];
    }


}
