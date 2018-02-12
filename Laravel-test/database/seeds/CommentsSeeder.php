<?php

use App\Comments;
use App\Post;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $posts = Post::all();

        for ($i=1; $i<4; $i++){
            foreach ($posts as $post){
                $comment = new Comments();
                $comment->name = $faker->name;
                $comment->content = $faker->paragraph;
                $comment->date = '2018-02-06';
                $comment->post_id = $post->id;
                $comment->save();
            }

        }
    }
}
