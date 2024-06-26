<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!in_array('Class', session('permission')) && auth()->user()->type != 1) {
            abort(404);
        }

        $teachers_subject_classes = [];
        if (session('teachers_id')) {
            $teacher = Teacher::where('id', session('teachers_id'))->firstOrFail();

            $subject_ids = explode(', ', $teacher->subjects);
            $subjects = Subject::whereIn('id', $subject_ids)->get();

            foreach ($subjects as $subject) {
                $current_grade = GradeLevel::where('id', $subject->grade_level_id)->first();

                $teachers_subject_classes[] = [
                    'subject_name_id' => $subject['id'],
                    'subject_name' => $subject['subject_name'],
                    'schedule_time' => $subject['schedule_time'],
                    'schedule_time_end' => $subject['schedule_time_end'],
                    'current_grade' => $current_grade['grade'],
                    'current_grade_id' => $current_grade['id']
                ];
            }
        }

        $classes = Classes::all();

        $sectionsByGrade = Classes::all()->groupBy('grade_level')->map(function ($item, $key) {
            return $item->pluck('section')->toArray();
        });

        $render_data = [
            'classes' => $classes,
            'teachers_subject_classes' => $teachers_subject_classes,
            'sectionsByGrade' => $sectionsByGrade,
            'status' => $status = '0',
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

        $request->validate([
            'c_grade' => 'required',
            'c_section' => 'required',
        ]);

        $existingGrade = Classes::where('grade_level', $request->c_grade)->exists();

        if (!$existingGrade) {

            Classes::create([
                'grade_level' => $request->c_grade,
                'section' => $request->c_section,
            ]);

            return response()->json([
                'response' => 1,
                'message' => 'Class added successfully',
                'path' => '/Class/class'
            ]);
        }

        $existingSection = Classes::where('grade_level', $request->c_grade)
                                ->where('section', $request->c_section)
                                ->exists();

        if ($existingSection) {
            return response()->json([
                'response' => 0,
                'message' => 'Section already exists for this grade!',
                'path' => '/Class/class'
            ]);
        }

        Classes::create([
            'grade_level' => $request->c_grade,
            'section' => $request->c_section,
        ]);

        return response()->json([
            'response' => 1,
            'message' => "New Section is added in {$request->c_grade}",
            'path' => '/Class/class'
        ]);
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

        $render_message = [
            'response' => 1,
            'message' => 'Delete class success!',
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
    public function viewClass($id)
    {
        $query = Student::where('grade_level', $id)->get();

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
    public function viewStudentGrade($id, $subject_id)
    {

        $query = Student::query()->join('grade_levels', 'students.grade_level', '=', 'grade_levels.id')->join('subjects', 'grade_levels.id', '=', 'subjects.grade_level_id')->join('sections', 'students.section', '=', 'sections.id')->leftJoin('grades', 'students.id', '=', 'grades.student_id')->select(
            'students.*',
            'grade_levels.grade',
            'sections.section AS section_name',
            'subjects.subject_name',
            'grades.subject_id',
            'grades.quarter_1',
            'grades.quarter_2',
            'grades.quarter_3',
            'grades.quarter_4',
            'grades.final_rating'
        )->where('students.id', $id)->where('grades.subject_id', $subject_id)
            ->first();

        if ($query) {
            $render_data = [
                'response' => 1,
                'message' => $query
            ];
            return response()->json($render_data);
        }

        $query = Student::join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('subjects', 'grade_levels.id', 'subjects.grade_level_id')->join('sections', 'students.section', 'sections.id')->select('students.*', 'grade_levels.grade', 'sections.section AS section_name', 'subjects.subject_name')->where('students.id', $id)->first();
        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGrade(Request $request)
    {
        $grade = Grade::firstOrNew([
            'student_id' => $request->student_id,
            'subject_id' => $request->sub_in_id
        ]);

        $grade->quarter_1 = $request->input('quarter_1', null);
        $grade->quarter_2 = $request->input('quarter_2', null);
        $grade->quarter_3 = $request->input('quarter_3', null);
        $grade->quarter_4 = $request->input('quarter_4', null);
        
        $grade->save();

        $responseMessage = $grade->wasRecentlyCreated ? 'Creating student grade success' : 'Updating student grade success';

        $render_message = [
            'response' => 1,
            'message' => $responseMessage,
            'path' => '/Class/class'
        ];

        return response()->json($render_message);
    }
}
