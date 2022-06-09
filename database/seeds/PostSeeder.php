<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_post = new Post();

            $new_post->title = $faker->text(10);
            $new_post->content = $faker->paragraph(2);
            $new_post->image = $faker->imageUrl(250, 250);
            $new_post->slug = Str::slug($new_post->title, '-');

            $new_post->save();
        }
    }
}
