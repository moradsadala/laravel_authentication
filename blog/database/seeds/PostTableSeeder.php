<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post([
            'title'=>'The First Seeder Title',
            'content'=>'The First Seeder Content'
        ]);
        $post->save();
        $post = new Post([
            'title'=>'The Second Seeder Title',
            'content'=>'The Second Seeder Content'
        ]);
        $post->save();
    }
}
