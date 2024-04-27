<?php

namespace App\Http\Controllers;

use App\Models\RoleAndPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolesAndPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (!in_array('Roles And Permissions',session('permission')) && auth()->user()->type != 1) {
            abort(404);
        }

        $render_data = [
            'role_and_permissions' => RoleAndPermission::all(),
        ];

        return view('RolesandPermissions/rolesandpermissions', $render_data);
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
        $role_and_permission = RoleAndPermission::where('role', $request->role)->first();

        if ($role_and_permission) {
            $render_message = [
                'response' => 0,
                'message' => 'Role and permission is invalid! Already exist!',
                'path' => '/RolesandPermissions/rolesandpermissions'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'role' => $request->role,
            'permission' => implode(", ", $request->permissionRole),
        ];

        RoleAndPermission::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding role and permission success',
            'path' => '/RolesandPermissions/rolesandpermissions'
        ];

        return response()->json($render_message);
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
        $form_data = [
            'role' => $request->role,
            'permission' => implode(", ", $request->permissionRole),
        ];
        
        $request->session()->regenerate();
        $arr_sessions['permission'] = $request->permissionRole;
        Session::put($arr_sessions);

        RoleAndPermission::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating role and permission success',
            'path' => '/RolesandPermissions/rolesandpermissions'
        ];

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
}
