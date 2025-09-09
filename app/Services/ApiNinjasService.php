<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiNinjasService {
    public static function getRandomIdea() {
        $success = false;

        while (!$success) {
            $response = Http::withHeader('Origin', 'https://api-ninjas.com')
                ->get('https://api.api-ninjas.com/v1/bucketlist')
                ->json();

            if (isset($response['item'])) {
                $success = true;
            }
        }

        return $response['item'];
    }
}
