<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($data)
    {   
        // dd($data[1]);
        // dd(storage_path()."/app/");
        $this->data = $data;  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('emails.survey_report_email')
                     ->with('data',$this->data[0])
                     ->attach(storage_path()."/app/".$this->data[1]);
                     
    }
}
