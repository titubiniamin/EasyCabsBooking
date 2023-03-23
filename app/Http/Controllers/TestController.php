<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TestController extends Controller
{
    function test()
    {
        $recipients = '+8801911518462';
        $message = "hi this is bini amin";

        $sid = "ACc661b09a44ffd821f100a81f35089850";
        $token = "17d586f77fd0305dbee7e6ec211f7a2b";
        $from = env('TWILIO_NUMBER');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("whatsapp:$recipients", // to
                array(
                    "from" => "whatsapp:$from",
                    "body" => $message
                )
            );

        print($message->sid);

    }
}
