<?php

namespace App\Listeners;

use App\Events\SomethingHappended;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSomeWhereNotification implements ShouldQueue
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
    public function handle(SomethingHappended $event): void
    {
        User::create([
            'name' => "John",
            'email' => 'hQp8e@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
