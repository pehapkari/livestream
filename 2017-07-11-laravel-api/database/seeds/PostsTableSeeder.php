<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = factory(\App\User::class)->create();

        factory(\App\Post::class, 10)->create([
        	'user_id' => $user->id
        ])->each(function(\App\Post $post) {
        	factory(\App\Tag::class, 3)->create([
		        'post_id' => $post->id
	        ]);
        });
    }
}
