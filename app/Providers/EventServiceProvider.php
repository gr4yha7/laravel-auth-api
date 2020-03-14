<?php

/**
 * 
 */
namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\NewPrivateStudent::class => [
            // Each new student sends notifications to all students
            \App\Listeners\SendFacilitatorsNotification::class,
        ],
        \App\Events\FacilitatorReadyToTeach::class => [
            // Each facilitator fires a new event that sends notifications to management
            \App\Listeners\SendManagementNotificationOfFacilitator::class,
        ],
        \App\Events\FacilitatorPickedToTeach::class => [
            \App\Listeners\SendFacilitatorNotificationToTeach::class,
            \App\Listeners\SendStudentNotificationOfFacilitatorToPay::class,
        ],
        \App\Events\StudentPaidForCourse::class => [
            \App\Listeners\SendStudentPaymentNotification::class,
            \App\Listeners\SendManagementNotificationOfPayment::class,
            \App\Listeners\SendFacilitatorNotificationToStart::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
