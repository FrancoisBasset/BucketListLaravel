<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Friendship;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Schema::disableForeignKeyConstraints();

        Friendship::truncate();
        Comment::truncate();
        Idea::truncate();
        User::truncate();

        Schema::enableForeignKeyConstraints();

        $this->call([
            UserSeeder::class,
            IdeaSeeder::class,
            CommentSeeder::class,
            FriendshipSeeder::class
        ]);
    }
}
