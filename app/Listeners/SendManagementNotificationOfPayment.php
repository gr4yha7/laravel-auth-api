<?php

namespace App\Listeners;

use App\Events\StudentPaidForCourse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendManagementNotificationOfPayment
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
     * @param  StudentPaidForCourse  $event
     * @return void
     */
    public function handle(StudentPaidForCourse $event)
    {
        //
    }
}
