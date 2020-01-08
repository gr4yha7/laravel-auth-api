<?php

namespace App\Listeners;

use App\Events\NewPrivateStudent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFacilitatorsNotification
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
     * @param  NewPrivateStudent  $event
     * @return void
     */
    public function handle(NewPrivateStudent $event)
    {
        //
    }
}
