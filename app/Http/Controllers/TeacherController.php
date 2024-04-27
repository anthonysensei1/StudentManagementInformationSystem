<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'classes' => Classes::join('grade_levels', 'classes.grade_level', '=', 'grade_levels.id')->join('sections', 'classes.section', '=', 'sections.id')->select('classes.*', 'grade_levels.grade', 'sections.section AS section_name')->orderBy('classes.id', 'asc')->get(),
            'subjects' => Subject::join('grade_levels', 'subjects.grade_level_id', '=', 'grade_levels.id')->select('subjects.*', 'grade_levels.grade')->orderBy('subjects.grade_level_id', 'asc')->get(),
            'users' => User::join('teachers', 'users.user_type_id', '=', 'teachers.id')->select('teachers.*', 'users.name', 'users.username', 'users.password')->orderByRaw('CAST(teachers.employee_id AS UNSIGNED) ASC')->get(),
        ];

        $users = collect($render_data['users'])->map(function ($user) use ($render_data) {
            $subjectIds = explode(',', $user['subjects']);

            $filteredSubjects = collect($render_data['subjects'])->whereIn('id', $subjectIds);

            $subjects = $filteredSubjects->pluck('subject_name')->implode(', ');
            $subjectScheduleTimes = $filteredSubjects->pluck('schedule_time')->implode(', ');
            $subjectScheduleTimeEnds = $filteredSubjects->pluck('schedule_time_end')->implode(', ');

            $classes = collect($render_data['classes'])
                ->whereIn('id', explode(',', $user['classes']))
                ->map(function ($class) {
                    return 'Grade ' . $class['grade'] . ' - ' . $class['section_name'];
                })
                ->implode(', ');

            $user['subject_names'] = $subjects;
            $user['subject_schedule_time'] = $subjectScheduleTimes;
            $user['subject_schedule_time_end'] = $subjectScheduleTimeEnds;
            $user['class_names'] = $classes;

            return $user;
        });

        $render_data['users'] = $users;

        return view('Teacher/teacher', $render_data);
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

        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Invalid phone number!',
                'path' => '/Teacher/teacher'
            ]);
        }

        if ($request->subjects === null || $request->classes === null) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Please select classes and subjects!',
                'path' => '/Teacher/teacher'
            ]);
        }

        $exists = Teacher::where('employee_id', $request->employee_id)
            ->orWhere(function ($query) use ($request) {
                $query->where('first_name', $request->first_name)
                    ->where('middle_name', $request->middle_name)
                    ->where('last_name', $request->last_name);
            })
            ->exists();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Duplicate Employee or Name detected.',
                'path' => '/Teacher/teacher'
            ]);
        }

        $exists = User::where('username', $request->username)->first();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Username is invalid! Please use other username.',
                'path' => '/Teacher/teacher'
            ]);
        }

        $request->subjects = implode(', ', $request->subjects);
        $request->classes = implode(', ', $request->classes);

        $form_data = [
            'upload_image_name' => $request->upload_image_name,
            'employee_id' => $request->employee_id,
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'address' => ucfirst($request->address),
            'contact_number' => $request->contact_number,
            'email_add' => $request->email_add,
            'b_date' => $request->b_date,
            'age' => $request->age,
            'gender' => $request->gender[0],
            'subjects' => $request->subjects,
            'classes' => $request->classes,
        ];

        $teacher = Teacher::create($form_data);

        $form_data = [
            'name' => ucfirst($request->first_name) . " " . ucfirst($request->middle_name) . " " . ucfirst($request->last_name),
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'user_type_id' =>  $teacher->id
        ];

        User::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding teacher success',
            'path' => '/Teacher/teacher'
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

        if ($request->contact_number[0] != '0' || $request->contact_number[1] != '9' || strlen($request->contact_number) != 11) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Invalid phone number!',
                'path' => '/Teacher/teacher'
            ]);
        }

        if ($request->u_subjects === null || $request->u_classes === null) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Please select classes and subjects!',
                'path' => '/Teacher/teacher'
            ]);
        }

        $exists = Teacher::where(function ($query) use ($request) {
            $query->where('id', '!=', $request->id)
                ->where(function ($query) use ($request) {
                    $query->where('employee_id', $request->employee_id)
                        ->orWhere(function ($query) use ($request) {
                            $query->where('first_name', $request->first_name)
                                ->where('middle_name', $request->middle_name)
                                ->where('last_name', $request->last_name);
                        });
                });
        })->exists();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Teacher is invalid! Duplicate Employee or Name detected.',
                'path' => '/Teacher/teacher'
            ]);
        }

        $exists = User::where('username', $request->username)->where('user_type_id', '!=', $request->id)->first();

        if ($exists) {
            return response()->json([
                'response' => 0,
                'message' => 'Username is invalid! Please use other username.',
                'path' => '/Teacher/teacher'
            ]);
        }

        $request->u_subjects = implode(', ', $request->u_subjects);
        $request->u_classes = implode(', ', $request->u_classes);

        $form_data = [
            'upload_image_name' => $request->upload_image_name,
            'employee_id' => $request->employee_id,
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'address' => ucfirst($request->address),
            'contact_number' => $request->contact_number,
            'email_add' => $request->email_add,
            'b_date' => $request->b_date,
            'age' => $request->age,
            'gender' => $request->u_gender[0],
            'subjects' => $request->u_subjects,
            'classes' => $request->u_classes,
        ];

        Teacher::where('id', '=', $request->id)->update($form_data);
        $form_data = [
            'name' => ucfirst($request->first_name) . " " . ucfirst($request->middle_name) . " " . ucfirst($request->last_name),
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];

        User::where('user_type_id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating teacher success',
            'path' => '/Teacher/teacher'
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
        Teacher::where('id', '=', $request->id)->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Delete teacher success!',
            'path' => '/Teacher/teacher'
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
            $image->move(public_path('images_teacher'), $imageName);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function classes($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        $subject = Subject::join('grade_levels', 'subjects.grade_level_id', '=', 'grade_levels.id')->select('subjects.*', 'grade_levels.grade')->get();

        $classes = collect($subject)
            ->whereIn('id', explode(',', $teacher['subjects']))
            ->map(function ($class) {

                $response = [
                    'grade' => $class['grade'],
                    'subject_name' => $class['subject_name'],
                    'subject_code' => $class['subject_code'],
                    'schedule_time' => $class['schedule_time'],
                    'schedule_time_end' => $class['schedule_time_end']
                ];

                return $response;
            });

        return response()->json($classes);
    }
}
