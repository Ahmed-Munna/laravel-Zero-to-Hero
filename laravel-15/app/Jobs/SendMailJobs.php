<?php

namespace App\Jobs;

use App\Mail\SponserMail;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $userRequest;
    public function __construct($userRequest)
    {
        $this->userRequest = $userRequest;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        Mail::to($this->userRequest->email)->send(new SponserMail($this->userRequest));
    }

}
