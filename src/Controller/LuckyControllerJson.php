<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/quote")]
    public function jsonNumber(): Response
    {
        date_default_timezone_set('Europe/Stockholm');
        $timestamp = date("H:i:s");
        $date = date('Y-m-d');

        $quotes[1] = "The greatest glory in living lies not in never falling, but in rising every time we fall. -Nelson Mandela";
        $quotes[2] = "The way to get started is to quit talking and begin doing. -Walt Disney";
        $quotes[3] = "Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking. -Steve Jobs";
        $quotes[4] = "The best and most beautiful things in the world cannot be seen or even touched — they must be felt with the heart. -Helen Keller";
        $quotes[5] = "It is during our darkest moments that we must focus to see the light. -Aristotle";
        $quotes[6] = "Whoever is happy will make others happy too. -Anne Frank";

        $rand_num = rand(1,count($quotes));

        $data = [
            'todays date' => $date,
            'time-stamp for when the quote was generated' => $timestamp,
            'quote' => $quotes[$rand_num]
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
