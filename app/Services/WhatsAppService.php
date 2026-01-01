<?php

namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppService
{
    public static function send($to, $message)
    {
        $client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );

        $client->messages->create(
            "whatsapp:+$to",
            [
                'from' => config('services.twilio.whatsapp_from'),
                'body' => $message
            ]
        );
    }
}
