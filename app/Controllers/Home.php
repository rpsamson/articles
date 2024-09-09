<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
      //  $this->SendTestEmail();
        return view('welcome_message');
    }

    private function SendTestEmail() {
        $email =  \Config\Services::email();
        $email->setTo('samson.rp@gmail.com');
        $email->setSubject('Mail from SKE AUTION - You have completed the bid');
        $email->setMessage('<b>Great work done for SKE</b>');
        if($email->send()) 
        {
            echo "Email Sent";
        } else {
            echo "Email Could not be send";
        };
    }
}
