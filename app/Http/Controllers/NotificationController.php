<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMessage;
use Illuminate\Support\Facades\Mail;
use App\Models\SMS;
use App\Models\Student;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function sendNotifications(Request $request)
    {

        // Retrieve all users or a subset of users you wish to notify
        $students = Student::select('email_add')->get();
        $sendNotify = SMS::where('id',$request->id)->first();
        // Send an email to each user

        foreach ($students as $student) {
            Mail::to($student->email_add)->send(new NotifyMessage($sendNotify->message));
        }

        return response()->json(['message' => 'Notifications sent successfully']);
    }
}
