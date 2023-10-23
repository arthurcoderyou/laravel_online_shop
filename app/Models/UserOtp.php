<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Exception;
use Twilio\Rest\Client;

class UserOtp extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'otp',
        'expire_at',
    ];

    //function to send the sms
    public function sendSMS($recieverNumber){

        $message = 'Login OTP is '.$this->otp;

        try{

            // TWILIO_SID="ACbe46690b196ea6f1bc5b7639d21283e4"
            // TWILIO_TOKEN="48fce15b5d691fa2cfd68e053df04e88"
            // TWILIO_FROM="+639692696666"

            $account_id = env('TWILIO_SID');
            $auth_token = env('TWILIO_TOKEN');
            $twilio_number = env('TWILIO_FROM');

            //dd($twilio_number);

            $client = new Client($account_id,$auth_token);

            $client->messages->create($recieverNumber,[
                'from' => $twilio_number,
                'body' => $message
            ]);

            info('SMS Sent Successfully');


        }catch(\Exception $e){
            info("Error: ".$e->getMessage());
        }

    }

    //send Order Success Message
    static public function sendOrderSuccessMessage($recieverNumber,$order){
        $message = 'You have successfully place your order. Order ID : '.$order->id.' THANK YOU - SHOENIVERSE';

        try{

            // TWILIO_SID="ACbe46690b196ea6f1bc5b7639d21283e4"
            // TWILIO_TOKEN="48fce15b5d691fa2cfd68e053df04e88"
            // TWILIO_FROM="+639692696666"

            $account_id = env('TWILIO_SID');
            $auth_token = env('TWILIO_TOKEN');
            $twilio_number = env('TWILIO_FROM');

            //dd($twilio_number);

            $client = new Client($account_id,$auth_token);

            $client->messages->create($recieverNumber,[
                'from' => $twilio_number,
                'body' => $message
            ]);

            info('SMS Sent Successfully');


        }catch(\Exception $e){
            info("Error: ".$e->getMessage());
        }
    }

}
