<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExtendMail extends Mailable
{
    use SerializesModels;

    public $subject;
    public $data;
    public $view;

    public function __construct($subject, $data, $view)
    {
        $this->subject = $subject;
        $this->data = $data;
        $this->view = $view;
    }

    public function build()
    {
        return $this->subject($this->subject)->view($this->view);
    }
}
