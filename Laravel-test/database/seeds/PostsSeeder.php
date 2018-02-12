<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('posts')->insert([
//           'title'      => 'My blog post',
//           'content'    => 'My content',
//           'date'       => '2018-02-07'
//        ]);
            $faker = Faker\Factory::create();

            for ($i=0; $i<10; $i++){
                $post = new Post();
                $post->title = $faker->name;
                $post->content = $faker->paragraph;
                $post->date = '2018-02-06';
                $post->save();
            }


    }

}
