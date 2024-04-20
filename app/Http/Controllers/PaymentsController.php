<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'sections' => Section::join('grade_levels', 'sections.grade_level_id', '=', 'grade_levels.id')->select('sections.*', 'grade_levels.grade')->orderBy('grade_levels.grade', 'asc')->get(),
            'grades' => GradeLevel::all(),
        ];

        return view('Payments/payments', $render_data);
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
     * @param  int|string $id The ID or name of the student to search for.
     * @return \Illuminate\Http\Response
     */
    public function student_search($id)
    {
        $query = Student::join('grade_levels', 'students.grade_level', '=', 'grade_levels.id')
            ->join('sections', 'students.section', '=', 'sections.id')
            ->select(
                'students.*',
                'grade_levels.grade',
                'sections.section AS section_name',
                DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS student_name')
            );

        if (is_numeric($id)) {
            $query->where('students.id_no', $id);
        } else {
            $query->whereRaw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) LIKE ?', ["%{$id}%"]);
        }

        $student = $query->first();

        $render_data = [
            'response' => 1,
            'message' => $student
        ];
        return response()->json($render_data);
    }
}
