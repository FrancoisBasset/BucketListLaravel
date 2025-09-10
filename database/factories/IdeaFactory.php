<?php

namespace Database\Factories;

use App\Services\ApiNinjasService;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory {
    public function definition(): array {
        return [
            'title' => ApiNinjasService::getRandomIdea(),
            'description' => '',
            'user_id' => 1
        ];
    }
}
