<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;


class Common extends Mailable
{
	use Queueable, SerializesModels;

	

	private $data;

	public function __construct($data)
    {
    	$this->data= $data;
    }

    public function build()
    {
        return $this->subject($this->data['subject'])
                    ->from('support@hokutousuisan.com', $this->data['name'])
                    ->view('ecm.agreement');
       
    }



}



?>