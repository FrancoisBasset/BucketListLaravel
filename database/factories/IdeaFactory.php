<?php

namespace Database\Factories;

use App\Services\ApiNinjasService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Stichoza\GoogleTranslate\GoogleTranslate;

class IdeaFactory extends Factory {
    public function definition(): array {
        return [
            'title' => GoogleTranslate::trans(ApiNinjasService::getRandomIdea(), 'fr'),
            'description' => '',
            'user_id' => 1
        ];
    }
}
