<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'sections' => Section::all(),
            'grades' => GradeLevel::all(),
            'classes' => Classes::join('grade_levels', 'classes.grade_level', 'grade_levels.id')->join('sections', 'classes.section', 'sections.id')->select('classes.*', 'grade_levels.grade', 'sections.section AS section_name')->orderBy('classes.grade_level', 'asc')->get(),
        ];

        return view('Class/class', $render_data);
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
        $class = Classes::where('section', $request->c_section)->where('grade_level', $request->c_grade)->first();

        if ($class) {
            $render_message = [
                'response' => 0,
                'message' => 'Classes is invalid! Already exist!',
                'path' => '/Class/class'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'grade_level' => $request->c_grade,
            'section' => $request->c_section,
        ];

        Classes::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding class success',
            'path' => '/Class/class'
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
        $class = Classes::where('section', $request->c_section)->where('grade_level', $request->c_grade)->where('id', '!=', $request->id)->first();
        
        if ($class) {
            $render_message = [
                'response' => 0,
                'message' => 'Classes is invalid! Already exist!',
                'path' => '/Class/class'
            ];
        
            return response()->json($render_message); 
        }

        $form_data = [
            'grade_level' => $request->c_grade,
            'section' => $request->c_section,
        ];

        Classes::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating class success',
            'path' => '/Class/class'
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
        Classes::where('id', '=', $request->id)->delete();

        $renderMessage = [
            'response' => 1,
            'message' => 'Delete class success!',
            'path' => '/Class/class'
        ];

        return response()->json($renderMessage);
    }
}
