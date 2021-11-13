<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;

        //para poner en cero cuandolas lee
        auth()->user()->unreadNotifications->MarkAsRead();

        return view('notifications.index', compact('notifications'));
    }
}
