<?php

namespace App\Listeners;

use App\Events\CreateUsers;
use App\Mail\CreateUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CreateUsersNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateUsers $event): void
    {
        Mail::to("ahmedmunna@gmail.com")->send(new CreateUserMail($event->user));
    }
}
