<?php

namespace App\Http\Controllers;

use App\Post;
use App\Transformers\PostTransformer;



class PostsController extends Controller
{

	public function index()
	{
		return $this->response->collection(
			Post::with('user', 'tags')->get(), new PostTransformer
		);
	}



	public function show(Post $post)
	{
		return $this->response->item($post->load('user', 'tags'), new PostTransformer);
	}
}
