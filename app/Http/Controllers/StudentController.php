<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\GradeLevel;
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

        $classes = Classes::all();

        $sectionsByGrade = Classes::all()->groupBy('grade_level')->map(function ($item, $key) {
            return $item->pluck('section')->toArray();
        });

        $render_data = [
            'classes' => $classes,
            'students' => Student::all(),
            'sectionsByGrade' => $sectionsByGrade,
        ];

        // dd($render_data);

        return view('Students/students', $render_data);
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

        // if ($request->grade_level == null || $request->section == null) {
        //     return response()->json([
        //         'response' => 0,
        //         'message' => 'Student is invalid! Please select grade level and section!',
        //         'path' => '/Students/students'
        //     ]);
        // }

        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Student parent is invalid! Invalid phone number!',
                'path' => '/EnrollmentProcess/enrollmentprocess'
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
            // 'grade_level' => $request->grade_level[0],
            // 'section' => $request->section[0],
            'student_status' => $request->student_status,
            'p_first_name' => ucfirst($request->p_first_name),
            'p_middle_name' => ucfirst($request->p_middle_name),
            'p_last_name' => ucfirst($request->p_last_name),
            'contact_number' => $request->contact_number,
            'email_add' => ucfirst($request->email_add),
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

        // if ($request->u_grade_level_ == null || $request->u_section_ == null) {
        //     return response()->json([
        //         'response' => 0,
        //         'message' => 'Student is invalid! Please select grade level and section!',
        //         'path' => '/Students/students'
        //     ]);
        // }

        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Student parent is invalid! Invalid phone number!',
                'path' => '/EnrollmentProcess/enrollmentprocess'
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
            // 'grade_level' => $request->u_grade_level_[0],
            // 'section' => $request->u_section_[0],
            'student_status' => $request->student_status,
            'p_first_name' => ucfirst($request->p_first_name),
            'p_middle_name' => ucfirst($request->p_middle_name),
            'p_last_name' => ucfirst($request->p_last_name),
            'contact_number' => $request->contact_number,
            'email_add' => ucfirst($request->email_add),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSubjects(Request $request)
    {
        $class =  Classes::where('grade_level', '=', $request->grade_id)->get();
        return response()->json($class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentEnroll(Request $request)
    {
        
        $form_data = [
            'class_id' => $request->sc_sel,
            'enroll_status' => 1,
            'nso' => $request->nso == null ? 0 : 1,
            'e_form' => $request->e_form == null ? 0 : 1,
            'form_137' => $request->form_137 == null ? 0 : 1,
        ];

        Student::where('id', '=', $request->id)->update($form_data);

        $render_data = [
            'response' => 1,
            'message' => 'Student enrollment success',
            'path' => '/Students/students'
        ];
        return response()->json($render_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentAll(Request $request)
    {
        $class = Classes::where('grade_level', '=', $request->grade)->where('section', '=', $request->sections_grade)->first();

        if (!$class) {
            $render_data = [
                'response' => 0,
                'message' => 'Selected section is not valid please try again.',
                'path' => '/Students/students'
            ];
            return response()->json($render_data);
        }

        $students = Student::join('classes', 'students.class_id', '=', 'classes.id')->where('class_id', '=', $class['id'])->select('students.*', 'classes.grade_level', 'classes.section')->get();

        return response()->json($students);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentDestroy(Request $request)
    {
        Student::where('id', '=', $request->id)->delete();

        return redirect('/Students/students');
    }
}
