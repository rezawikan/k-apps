<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\FeedbackRequest;
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
    public function store(FeedbackRequest $request)
    {
        $receivers = $request->receiver;
        if ($request->receiver === 'leadershipteam') {
            $receivers = [
              // 'mezako.dito@gmail.com',
              // 'reza.wikan.dito@gmail.com'
              'ewa.wojkowska@kopernik.info',
              'toshi.nakamura@kopernik.info',
              'tomohiro.hamakawa@kopernik.info',
              'slamet.pribadi@kopernik.info',
              'werner.brandt@kopernik.info',
              'nonie.kaban@kopernik.info',
              'anna.baranova@kopernik.info',
              'sarah.wilson@kopernik.info',
              'hiromi.tengeji@kopernik.info'
            ];
        }

        $when = now()->addMinutes(1);

        Notification::route('mail', $receivers)->notify((new FeedbackMessage($request->sender, $request->message))->delay($when));

        return redirect('k-feedback')->with('status', 'Feedback will be send in one minute!');
    }
}
