<?php

namespace App;

final class UploadImage
{

	public function upload($image)
	{
		$this->image = $image;

		$this->validate()
			->compress()
			->upload()
			->insertIntoDatabase()
			->log();
	}



	public function validate(): self
	{
		if (pathinfo($this->image, PATHINFO_EXTENSION) !== 'jpg') {
			throw new \Exception();
		}

		return $this;
	}



	public function compress(): self
	{
		$this->compressor->compress($this->image);

		return  $this;
	}
}
