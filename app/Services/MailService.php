<?php
namespace App\Services;

use App\Mail\ExtendMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail($mailTo, $subject, $data, $view)
    {
        Mail::to($mailTo)->send(new ExtendMail($subject, $data, $view));
        Log::info('SEND MAIL SUCCESS: ' . $subject . ' TO EMAIL: ' . $mailTo);
        return true;
    }
}
