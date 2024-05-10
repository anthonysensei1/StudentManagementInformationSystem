<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\GradeLevel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if (!in_array('Students',session('permission')) && auth()->user()->type != 1) {
        //     abort(404);
        // }

        // $render_data = [
        //     'sections' => Section::where('status', 1)->get(),
        //     'grades' => GradeLevel::where('status', 1)->get(),
        //     'students' => Student::join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('students.*', 'grade_levels.grade', 'sections.section AS section_name')->orderBy('students.id_no', 'asc')->get(),
        // ];

        // return view('Students/students', $render_data);
        return view('Students/students');
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

        if ($request->grade_level == null || $request->section == null) {
            return response()->json([
                'response' => 0,
                'message' => 'Student is invalid! Please select grade level and section!',
                'path' => '/Students/students'
            ]);
        }

        $exists = Student::where('id_no', $request->id_no)
                    ->orWhere('lrn', $request->lrn)
                    ->orWhere(function($query) use ($request) {
                        $query->where('first_name', $request->first_name)
                              ->where('middle_name', $request->middle_name)
                              ->where('last_name', $request->last_name);
                    })
                    ->exists();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Student is invalid! Duplicate Id number, LRN, or Name detected.',
                'path' => '/Students/students'
            ]);
        }
        
        $form_data = [
            'upload_image_name' => $request->upload_image_name,
            'id_no' => $request->id_no,
            'lrn' => $request->lrn,
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'address' => ucfirst($request->address),
            'b_date' => $request->b_date,
            'age' => $request->age,
            'gender' => $request->gender[0],
            'grade_level' => $request->grade_level[0],
            'section' => $request->section[0],
        ];

        Student::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding students success',
            'path' => '/Students/students'
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

        if ($request->u_grade_level_ == null || $request->u_section_ == null) {
            return response()->json([
                'response' => 0,
                'message' => 'Student is invalid! Please select grade level and section!',
                'path' => '/Students/students'
            ]);
        }

        $exists = Student::where(function($query) use ($request) {
            $query->where('id_no', $request->id_no)
                  ->orWhere('lrn', $request->lrn)
                  ->orWhere(function($subQuery) use ($request) {
                      $subQuery->where('first_name', $request->first_name)
                               ->where('middle_name', $request->middle_name)
                               ->where('last_name', $request->last_name);
                  });
        })
        ->where('id', '!=', $request->id)
        ->exists();
        
        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Student is invalid! Duplicate Id number, LRN, or Name detected.',
                'path' => '/Students/students'
            ]);
        }
        
        $form_data = [
            'upload_image_name' => $request->upload_image_name,
            'id_no' => $request->id_no,
            'lrn' => $request->lrn,
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'address' => ucfirst($request->address),
            'b_date' => $request->b_date,
            'age' => $request->age,
            'gender' => $request->u_gender[0],
            'grade_level' => $request->u_grade_level_[0],
            'section' => $request->u_section_[0],
        ];

        Student::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Update students success',
            'path' => '/Students/students'
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
        Student::where('id', '=', $request->id)->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Delete students success!',
            'path' => '/Students/students'
        ];

        return response()->json($render_message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $render_message = [
                'response' => 1,
                'message' => $imageName
            ];

            return response()->json($render_message);

        } else {

            $render_message = [
                'response' => 0,
                'message' => 'No image found'
            ];

            return response()->json($render_message);

        }
    }
}
