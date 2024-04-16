<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'grades' => GradeLevel::all(),
            'subjects' => Subject::join('grade_levels', 'subjects.grade_level_id', '=', 'grade_levels.id')->select('subjects.*', 'grade_levels.grade')->orderBy('subjects.grade_level_id', 'asc')->get(),
        ];

        return view('Subject/subject', $render_data);
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

        $subject = Subject::where('subject_name', $request->subject_name)->orWhere('subject_code', $request->subject_code)->first();

        if ($subject) {
            $render_message = [
                'response' => 0,
                'message' => 'Subject is invalid! Subject name or Subject code already exist! Please check Subject name and Subject code!',
                'path' => '/Subject/subject'
            ];

            return response()->json($render_message); 
        }

        if(strtotime($request->schedule_time) >= strtotime($request->schedule_time_end)) {
            $render_message = [
                'response' => 0,
                'message' => 'Schedule is invalid!',
                'path' => '/Subject/subject'
            ];

            return response()->json($render_message);
        }

        $schedule_times = Subject::where('grade_level_id', $request->grade)->get();
        foreach ($schedule_times as $schedule_time) {
            $existing_start = strtotime($schedule_time['schedule_time']);
            $existing_end = strtotime($schedule_time['schedule_time_end']);
            $new_start = strtotime($request->schedule_time);
            $new_end = strtotime($request->schedule_time_end);

            if (($new_start < $existing_end) && ($new_end > $existing_start)) {
                $render_message = [
                    'response' => 0,
                    'message' => 'Schedule is invalid! Conflict schedule. Please check the schedule in the table!',
                    'path' => '/Subject/subject'
                ];

                return response()->json($render_message);
            }
        }
        
        $form_data = [
            'subject_name' => ucfirst($request->subject_name),
            'subject_code' => $request->subject_code,
            'grade_level_id' => $request->grade,
            'schedule_time' => date('h:i A', strtotime($request->schedule_time)),
            'schedule_time_end' => date('h:i A', strtotime($request->schedule_time_end)),
        ];

        Subject::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding subject sucess',
            'path' => '/Subject/subject'
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

        $subject = Subject::where(function ($query) use ($request) {
            $query->where('subject_name', $request->subject_name)
                  ->orWhere('subject_code', $request->subject_code);
        })->where('id', '!=', $request->id)->first();
        
        if ($subject) {
            $render_message = [
                'response' => 0,
                'message' => 'Subject is invalid! Subject name or Subject code already exist! Please check Subject name and Subject code! ',
                'path' => '/Subject/subject'
            ];
        
            return response()->json($render_message); 
        }        

        if(strtotime($request->schedule_time) >= strtotime($request->schedule_time_end)) {
            $render_message = [
                'response' => 0,
                'message' => 'Schedule is invalid!',
                'path' => '/Subject/subject'
            ];

            return response()->json($render_message);
        }

        $schedule_times = Subject::where('grade_level_id', $request->grade)->where('id', '!=', $request->id)->get();
        foreach ($schedule_times as $schedule_time) {
            $existing_start = strtotime($schedule_time['schedule_time']);
            $existing_end = strtotime($schedule_time['schedule_time_end']);
            $new_start = strtotime($request->schedule_time);
            $new_end = strtotime($request->schedule_time_end);

            if (($new_start < $existing_end) && ($new_end > $existing_start)) {
                $render_message = [
                    'response' => 0,
                    'message' => 'Schedule is invalid! Conflict schedule. Please check the schedule in the table!',
                    'path' => '/Subject/subject'
                ];

                return response()->json($render_message);
            }
        }

        $form_data = [
            'subject_name' => ucfirst($request->subject_name),
            'subject_code' => $request->subject_code,
            'grade_level_id' => $request->grade,
            'schedule_time' => date('h:i A', strtotime($request->schedule_time)),
            'schedule_time_end' => date('h:i A', strtotime($request->schedule_time_end)),
        ];

        Subject::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating subject sucess',
            'path' => '/Subject/subject'
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
        Subject::where('id', '=', $request->id)->delete();

        $renderMessage = [
            'response' => 1,
            'message' => 'Delete subject success!',
            'path' => '/Subject/subject'
        ];

        return response()->json($renderMessage);
    }
}
