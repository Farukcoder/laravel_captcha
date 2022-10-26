<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\UserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class SendPostNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostProcessed  $event
     * @return void
     */
    public function handle(PostProcessed $event)
    {
        $user = User::all();

        foreach($user as $users){
            \Mail::to($users->email)->send(new usermail($event->post));
        }
    }
}
