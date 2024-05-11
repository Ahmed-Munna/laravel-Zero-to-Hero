<?php

namespace App\Http\Controllers;

use App\Jobs\SendLowPriorityEmail;
use App\Jobs\SendMailJobs;
use App\Jobs\SendNotificationJob;
use App\Jobs\SendOtpJobs;
use App\Jobs\UploadVideoJob;
use App\Jobs\VideoProcessingJob;
use App\Mail\SendOTP;
use App\Mail\SponserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    
    public function sendEmail(Request $request) {

        // dispatch queue mail

        for ($i = 0; $i < 10; $i++) {

            SendMailJobs::dispatch((object)$request->all());
        }

        return response()->json(["status" => "success", "message" => "email send successfull"]);
    }

    public function sendOtp(Request $request) {

        $otp = rand(111111, 999999);
        SendOtpJobs::dispatch($otp)->onQueue('high');
        return response()->json(["status" => "success", "message" => "email send successfull"]);
    }

    public function sendLowPriorityEmail(Request $request) {

        SendLowPriorityEmail::dispatch()->onQueue('middle');
        return response()->json(["status" => "success", "message" => "email send successfull"]);
    }

    public function VideoProcessing(Request $request) {

        // dispatch queue sequence

        Bus::chain([
            new UploadVideoJob(),
            new VideoProcessingJob(),
            new SendNotificationJob()
        ])
        ->catch(function($ex) { 
            echo $ex->getMessage(); 
        })
        ->dispatch();

        return response()->json(["status" => "success", "message" => "Video processing successfull"]);
    }
}
