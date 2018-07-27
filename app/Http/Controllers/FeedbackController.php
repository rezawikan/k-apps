<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\FeedbackMessage;
use Illuminate\Support\Facades\Notification;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
          'sender'     => 'required|String',
          'receiver'   => 'required|email',
          'message'    => 'required|string'
        ]);

        Notification::route('mail', $request->receiver)->notify(new FeedbackMessage($request->sender, $request->message));

        return redirect('k-feedback')->with('status', 'Feedback has sent!');
    }
}
