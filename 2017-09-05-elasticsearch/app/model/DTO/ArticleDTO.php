<?php

namespace App\Model\DTO;


class ArticleDTO implements ArticleInterface {

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $text;

	public function __construct(int $id, string $title, string $text) {
		$this->title = $title;
		$this->text = $text;
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getText(): string {
		return $this->text;
	}

}