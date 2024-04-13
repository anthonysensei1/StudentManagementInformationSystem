<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'grade_levels' => GradeLevel::all(),
        ];

        return view('GradeLevel/grade', $render_data);
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

        $grade = GradeLevel::where('grade', $request->grade)->first();

        if ($grade) {
            $render_message = [
                'response' => 0,
                'message' => 'Grade is invalid!',
                'path' => '/GradeLevel/grade'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'grade' => ucfirst($request->grade),
        ];

        GradeLevel::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding grade sucess',
            'path' => '/GradeLevel/grade'
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

        $grade = GradeLevel::where('grade', $request->grade)->where('id', '!=', $request->id)->first();

        if ($grade) {
            $render_message = [
                'response' => 0,
                'message' => 'Grade is already exist!',
                'path' => '/GradeLevel/grade'
            ];

            return response()->json($render_message); 
        }

        $form_data = [
            'grade' => ucfirst($request->grade),
        ];

        GradeLevel::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating grade sucess',
            'path' => '/GradeLevel/grade'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->status == 1 ? $request->status = 0 : $request->status = 1;

        $form_data = [
            'status' => $request->status,
        ];

        GradeLevel::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating status success!',
            'path' => '/GradeLevel/grade'
        ];

        return response()->json($render_message);
    }
}
