<?php

namespace App\Model\Entity;

use App\Model\DTO\ArticleInterface;
use Doctrine\ORM\Mapping as ORM;
use Nette\SmartObject;

/**
 * @ORM\Entity()
 */
class Article implements ArticleInterface {

	use SmartObject;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $text;

	public function __construct(string $title, string $text) {
		$this->title = $title;
		$this->text = $text;
	}

	/**
	 * @return int
	 */
	public function getId(): int {
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