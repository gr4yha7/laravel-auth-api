<?php

namespace App\Listeners;

use App\Events\FacilitatorPickedToTeach;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendStudentNotificationOfFacilitatorToPay
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
     * @param  FacilitatorPickedToTeach  $event
     * @return void
     */
    public function handle(FacilitatorPickedToTeach $event)
    {
        //
    }
}
