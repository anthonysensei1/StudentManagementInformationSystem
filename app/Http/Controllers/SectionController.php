<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        ];

        return view('Section/section', $render_data);
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

        $section = Section::where('section', $request->section)->first();

        if ($section) {
            $render_message = [
                'response' => 0,
                'message' => 'Section is invalid!',
                'path' => '/Section/section'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'section' => ucfirst($request->section),
        ];

        Section::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding section sucess',
            'path' => '/Section/section'
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

        $section = Section::where('section', $request->section)->where('id', '!=', $request->id)->first();

        if ($section) {
            $render_message = [
                'response' => 0,
                'message' => 'Section is already exist!',
                'path' => '/Section/section'
            ];

            return response()->json($render_message); 
        }

        $form_data = [
            'section' => ucfirst($request->section),
        ];

        Section::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating section sucess',
            'path' => '/Section/section'
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

        Section::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating status success!',
            'path' => '/Section/section'
        ];

        return response()->json($render_message);
    }
}
