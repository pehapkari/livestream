<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;



class PostTransformer extends TransformerAbstract
{

	public $defaultIncludes = [
		'tags',
		'user'
	];



	public function transform(Post $post)
	{
		return [
			'id'         => $post->id,
			'content'    => $post->content,
			'publish_at' => $post->publish_at->toDateTimeString()
		];
	}



	public function includeTags(Post $post)
	{
		return $this->collection($post->tags, new TagTransformer);
	}



	public function includeUser(Post $post)
	{
		return $this->item($post->user, (new UserTransformer)->hideEmail());
	}
}
