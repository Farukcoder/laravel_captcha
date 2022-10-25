<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\UserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;

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

        \Mail::to(Auth::user()->email)->send(new usermail($event->post));
    }
}
