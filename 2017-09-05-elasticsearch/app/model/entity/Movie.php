<?php
 
namespace AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nette\SmartObject;

/**
 * @ORM\Entity
 */
class Movie
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var integer
	 */
	private $id;

	/**
	 * @var bool
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	private $color;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $directorName;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $numCriticForReviews;

	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $duration;

	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $directorFacebookLikes;

	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $gross;

	/**
	 * @var Collection|Movie[]
	 * @ORM\ManyToMany(targetEntity="Genre")
	 */
	private $genres;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $movieTitle;

	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $numVotedUsers;

	/**
	 * @var Collection|Keyword[]
	 * @ORM\ManyToMany(targetEntity="Keyword")
	 */
	private $plotKeywords;

	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $numUsersForReviews;


	/**
	 * @var Language
	 * @ORM\ManyToOne(targetEntity="Language")
	 */
	private $language;

	/**
	 * @var Country
	 * @ORM\ManyToOne(targetEntity="Country")
	 */
	private $country;

	/**
	 * @var ContentRating
	 * @ORM\ManyToOne(targetEntity="ContentRating")
	 */
	private $contentRating;

	/**
	 * @return int
	 */
	public function getId(): ?int {
		return $this->id;
	}

	/**
	 * @return bool
	 */
	public function isColor(): ?bool {
		return $this->color;
	}

	/**
	 * @return string
	 */
	public function getDirectorName(): ?string {
		return $this->directorName;
	}

	/**
	 * @return string
	 */
	public function getNumCriticForReviews(): ?string {
		return $this->numCriticForReviews;
	}

	/**
	 * @return int
	 */
	public function getDuration(): ?int {
		return $this->duration;
	}

	/**
	 * @return int
	 */
	public function getDirectorFacebookLikes(): ?int {
		return $this->directorFacebookLikes;
	}

	/**
	 * @return int
	 */
	public function getGross(): ?int {
		return $this->gross;
	}

	/**
	 * @return Movie[]|Collection
	 */
	public function getGenres() {
		return $this->genres;
	}

	/**
	 * @return string
	 */
	public function getMovieTitle(): ?string {
		return $this->movieTitle;
	}

	/**
	 * @return int
	 */
	public function getNumVotedUsers(): ?int {
		return $this->numVotedUsers;
	}

	/**
	 * @return Keyword[]|Collection
	 */
	public function getPlotKeywords() {
		return $this->plotKeywords;
	}

	/**
	 * @return int
	 */
	public function getNumUsersForReviews(): ?int {
		return $this->numUsersForReviews;
	}

	/**
	 * @return Language
	 */
	public function getLanguage(): ?Language {
		return $this->language;
	}

	/**
	 * @return Country
	 */
	public function getCountry(): ?Country {
		return $this->country;
	}

	/**
	 * @return ContentRating
	 */
	public function getContentRating(): ?ContentRating {
		return $this->contentRating;
	}

	public function toArray() {
		return [
			'id' => $this->id,
			'color' => $this->color,
			'country' => $this->country !== null ? $this->country->getName() : '',
			'directorName' => $this->directorName,
			'numCritticForReviews' => $this->numCriticForReviews,
			'duration' => $this->duration,
			'directorFacebookLikes' => $this->directorFacebookLikes,
			'gross' => $this->gross,
			'movieTitle' => $this->movieTitle,
			'numUsersForReviews' => $this->numUsersForReviews,
			'numVotedUsers' => $this->numVotedUsers,
			'contentRating' => $this->contentRating !== null ? $this->contentRating->getName() : '',
			'language' => $this->language !== null ? $this->language->getName() : '',
			'genres' => $this->genres->map(function (Genre $genre) {return $genre->getName();})->toArray(),
			'plotKeywords' => $this->plotKeywords->map(function (Keyword $keyword) {return $keyword->getName();})->toArray(),
		];
	}
}

