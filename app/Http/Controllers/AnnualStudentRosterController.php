<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class AnnualStudentRosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!in_array('Annual Student Roster',session('permission')) && auth()->user()->type != 1) {
            abort(404);
        }

        $render_data = [
            'grade_levels' => GradeLevel::all(),
        ];

        return view('AnnualStudentRoster/annualstudentroster', $render_data);
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
    public function search_student($year, $grade)
    {
        $query = Student::join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('students.*', 'grade_levels.grade', 'sections.section AS section_name')->whereYear('students.created_at', $year)->where('students.grade_level', $grade)->get();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);

    }
}
