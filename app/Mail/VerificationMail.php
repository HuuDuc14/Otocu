<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $email;
    public $phone_number;
    public $password;
    public $code;

    public function __construct($username, $email, $phone_number, $password, $code)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
        $this->code = $code;
    }

    public function build()
    {
        return $this->subject('Xác thực tài khoản')
                    ->view('emails.verify')
                    ->with([
                        'username' => $this->username,
                        'email' => $this->email,
                        'phone_number' => $this->phone_number,
                        'password' => $this->password,
                        'code' => $this->code,
                    ]);
    }
}