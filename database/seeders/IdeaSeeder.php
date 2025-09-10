<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Idea::factory()->count(3)->sequence(
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3]
        )->create();
    }
}
