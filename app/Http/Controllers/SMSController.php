<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMS;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'SMS' => SMS::all(),
        ];

        return view('SMS/sms', $render_data);
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
        $sms = SMS::where('message', $request->message)->first();

        if ($sms) {
            $render_message = [
                'response' => 0,
                'message' => 'SMS message is invalid! Message already exist!',
                'path' => '/SMS/sms'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'message' => $request->message,
        ];

        SMS::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding sms message success',
            'path' => '/SMS/sms'
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
        $sms = SMS::where('message', $request->message)->where('id', '!=', $request->id)->first();

        if ($sms) {
            $render_message = [
                'response' => 0,
                'message' => 'SMS message is invalid! Message already exist!',
                'path' => '/SMS/sms'
            ];

            return response()->json($render_message); 
        }
        
        $form_data = [
            'message' => $request->message,
        ];

        SMS::where('id', '=', $request->id)->update($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating sms message success',
            'path' => '/SMS/sms'
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
        SMS::where('id', '=', $request->id)->delete();

        $renderMessage = [
            'response' => 1,
            'message' => 'Delete sms message success',
            'path' => '/SMS/sms'
        ];

        return response()->json($renderMessage);
    }
}
