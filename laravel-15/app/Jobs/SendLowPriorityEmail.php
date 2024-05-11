<?php

namespace App\Jobs;

use App\Mail\LowPriorityEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendLowPriorityEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        if (true) {
            throw new \Exception('Kichu Ekta Hoiche Rki');
        }

        // Mail::to("ahmedmunna4200@gmail.com")->send(new LowPriorityEmail());
    }

    public function failed($exception)
    {
        Mail::send([], [], function ($message) {

            $message->to('ahmedmunna4200@gmail.com')
                ->subject('Kichu Ekta Hoiche Rki')
                ->html('Something went wrong', 'text/html');
        });
    }
}
