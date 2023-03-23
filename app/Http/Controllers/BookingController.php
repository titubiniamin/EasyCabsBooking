<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
//use Telegram\Bot\Api as TelegramClient;
use TwilioClient;
//use TelegramBot;



class BookingController extends Controller
{
    function showBookingPage()
    {
//        Http::accept('application/json')->withToken('Bearer EAAJ9RredPaYBABaBs6IS8PFREWVh9lAY5iFtPd2TZCW1TBcOB19OZAfH0m4tWYCgIb3k5ZAqZA0UgPmpIb5tZCZAEwVf2Vn8k3g0oMLDKTE6JTaXDqKTWzF0PLuNDEkHIsoP7ZAotrpEqzCjS6ftqRRD7zvZAF9Pejh0XVu9uoMizM2BarJG1W75DlLMt298LxMOiB1VZAAKE6wZDZD')
//            ->post('https://graph.facebook.com/v15.0/114446158263243/messages ', [
//            'messaging_product' => 'whatsapp',
//            'to' => '8801911518462',
//            'type' => 'template',
//            'template' => [
//                'name' => 'Hello World',
//                'language' => ['code' => 'en_US'],
//            ],
//        ]);
        return view("booking");
    }


    function locationSuggestion(Request $request)
    {
        if($request->search != ''){
            $result = Location::query()
                ->where('location_name', 'like', '%' . $request->search . '%')
                ->get();
        }
        $output='';
        foreach ($result as $row) {
            $output .= '<li><a>'.$row->location_name.'</a></li>'
            ;
        }
        echo $output;
    }


    function locationSuggestion2(Request $request)
    {
        if($request->search != ''){
            $result = Location::query()
                ->where('location_name', 'like', '%' . $request->search . '%')
                ->get();
        }
        $output='';
        foreach ($result as $row) {
            $output .= '<li><a>'.$row->location_name.'</a></li>'
            ;
        }
        echo $output;
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'transfer' => 'required'
            ]
        );

        $booking = Booking::create([
            'transfer' => $request->transfer,
            'pickup_address' => $request->pickup_address,
            'drop_off_address' => $request->drop_off_address,
            'pickup_date' => $request->pickup_date,
            'no_passengers' => $request->no_passengers,
            'business_name' => $request->business_name,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'vehicle' => $request->vehicle,
            'trip_type' => $request->trip_type,
            'driver_instructions' => $request->driver_instructions,

        ]);
        Toastr::success('Booking Created Successfully!.', '', ["progressBar" => true]);

        $recipients = '+8801911518462';

        $message = "Transfer: ".$request->transfer."\n Pickup Address: ". $request->pickup_address."\n Drop of Address: " . $request->drop_off_address . "\n Pickup Date: " . $request->pickup_date . "\n No. of Passengers: " . $request->no_passengers . "\n Business Name: " . $request->business_name . "\n Name: " . $request->name . "\n Mobile: " . $request->mobile . "\n Email: " . $request->email . "\n Vehicle: " . $request->vehicle . "\n Trip Type: " . $request->trip_type . "\n";


        $client = new Client(['base_uri' => 'https://api.telegram.org/bot6023244014:AAFsl49rZxplJMGNKoIIY8IJiC2fN2VeuHo/']);
        $response = $client->request('POST', 'sendMessage', [
            'form_params' => [
                'chat_id' => '@myfirsttestchannel2023',
                'text' => $message,
            ]
        ]);
        $response->getBody()->getContents();
//        $message = "Transfer: ". $request->transfer."<br>".
//
        $sid = "ACc661b09a44ffd821f100a81f35089850";
        $token = "17d586f77fd0305dbee7e6ec211f7a2b";
        $from = env('TWILIO_NUMBER');
        $twilio = new TwilioClient($sid, $token);
        $message = $twilio->messages
            ->create("whatsapp:$recipients", // to
                array(
                    "from" => "whatsapp:$from",
                    "body" => $message
                )
            );

        return view('booking', compact('request'));

    }
}
