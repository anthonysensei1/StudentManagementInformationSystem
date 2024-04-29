<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMessage;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function sendNotifications()
    {
        // Retrieve all users or a subset of users you wish to notify
        // $users = User::select('email')->whereNotNull('email')->get();

        // // Send an email to each user
        // foreach ($users as $user) {
            Mail::to('dacoylomarkemilcajes@gmail.com')->send(new NotifyMessage());
        // }

        return response()->json(['message' => 'Notifications sent successfully']);
    }
}
