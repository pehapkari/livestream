<?php

namespace App;

interface Storage
{
	public function setDestination(): self;

	public function upload(array $files);
}

final class Upload
{

	/**
	 * @var Storage
	 */
	private $storage;


	public function __construct(Storage $storage)
	{
		$this->storage = $storage;
	}

	public function upload($files)
	{
		$this->storage->upload($files);
	}
}

class StorageFactory
{

	public static function make($fileType): Storage
	{
		if (is_null($fileType)) {
			$storage = new DefaultStorage();
		}

		if ($fileType === 'pdf') {
			$storage->isPdf();
		}

		return CustomStorage();
	}
}

$storage = StorageFactory::make('pdf');
$storage->setDestination('/foo');

(new Upload($storage))->upload(['a', 'b']);
