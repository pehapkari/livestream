<?php

namespace App\Transformers;

use App\Tag;
use League\Fractal\TransformerAbstract;



class TagTransformer extends TransformerAbstract
{

	public function transform(Tag $tag)
	{
		return [
			'id'   => $tag->id,
			'name' => $tag->name
		];
	}
}
