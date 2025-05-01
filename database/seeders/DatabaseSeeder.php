<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(150)->create();
        Post::factory(1500)->create();
        Tag::factory(50)->create();

        for ($i = 0; $i < 1500; $i++) {
            DB::table('post_tag')->insertOrIgnore([
                'post_id' => mt_rand(1, 1500),
                'tag_id' => mt_rand(1, 50),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        for ($i = 0; $i < 1500; $i++) {
            DB::table('category_post')->insertOrIgnore([
                'post_id' => mt_rand(1, 1500),
                'category_id' => mt_rand(1, 150),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
    }
}
