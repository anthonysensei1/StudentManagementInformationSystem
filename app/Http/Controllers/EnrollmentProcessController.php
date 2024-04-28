<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class EnrollmentProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!in_array('Assessments', session('permission')) && auth()->user()->type != 1) {
            abort(404);
        }

        $grade_levels = GradeLevel::all();
        $sections = Section::all();
        $arr_sections = [];
        foreach ($grade_levels as $grade_level) {
            $arr_sections[$grade_level['id']] = [];
            foreach ($sections as $section) {
                if ($section['grade_level_id'] == $grade_level['id']) {
                    $arr_sections[$grade_level['id']][$section['id']] = $section['section'];
                }
            }
        }

        // dd($arr_sections);

        $render_data = [
            'grade_levels' => $grade_levels,
            'sections' => $arr_sections,
        ];

        return view('EnrollmentProcess/enrollmentprocess', $render_data);
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
    public function update(Request $request, $id)
    {
        //
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
    public function getStudents($id, $section)
    {
        $query = Student::join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('students.*', 'grade_levels.grade', 'sections.section AS section_name')->where('students.section', $section)->where('students.grade_level', $id)->get();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getStudent($id)
    {
        $query = Student::join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('students.*', 'grade_levels.grade', 'sections.section AS section_name')->where('students.id', $id)->first();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentsUpdate(Request $request)
    {
    
        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Student parent is invalid! Invalid phone number!',
                'path' => '/EnrollmentProcess/enrollmentprocess'
            ]);
        }
        
        $form_data = [
            'p_first_name' => ucfirst($request->p_first_name),
            'p_middle_name' => ucfirst($request->p_middle_name),
            'p_last_name' => ucfirst($request->p_last_name),
            'contact_number' => $request->contact_number,
            'email_add' => $request->email_add,
            'nso' => $request->nso_check == null ? 0 : 1,
            'e_form' => $request->enroll_check == null ? 0 : 1,
        ];

        Student::where('id', '=', $request->id)->update($form_data);

        $render_data = [
            'response' => 1,
            'message' => 'Updating student success',
            'path' => '/EnrollmentProcess/enrollmentprocess'
        ];
        return response()->json($render_data);
    }
}
