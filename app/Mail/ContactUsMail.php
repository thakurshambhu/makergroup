<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {   
        $this->data = $data; 
        $this->url = $url; 
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->view('emails.contact-us-email')->with('data',$this->data,'url',$this->url);
    }
}
