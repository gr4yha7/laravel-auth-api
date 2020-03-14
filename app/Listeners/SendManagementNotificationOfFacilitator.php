<?php

namespace App\Listeners;

use App\Events\FacilitatorReadyToTeach;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendManagementNotificationOfFacilitator
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
     * @param  FacilitatorReadyToTeach  $event
     * @return void
     */
    public function handle(FacilitatorReadyToTeach $event)
    {
        //
    }
}
