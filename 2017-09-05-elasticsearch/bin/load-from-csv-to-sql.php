<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 2017-09-05
 * Time: 11:51
 */

use League\Csv\Reader;
use Nette\Utils\Strings;
use Kdyby\Doctrine\Connection;

$container = require __DIR__ . '/../app/bootstrap.php';
\Tracy\Debugger::enable(false);

/** @var \Kdyby\Doctrine\Connection $connection */
$connection = $container->getByType(Connection::class);

$file = __DIR__ . '/../dataset/movie_metadata.csv';
$file = realpath($file);

$csv = Reader::createFromPath($file);
$csv->setHeaderOffset(0);

$input_bom = $csv->getInputBOM();

$replaceColor = ['Color' => 1, ' Black and White' => 0, '' => null];
$header = $csv->getHeader();

$genres = [];
$plotKeywords = [];
$languages = [];
$countries = [];
$contentRatings = [];

$movies = [];
foreach ($csv as $i => $record) {
	$record['color'] = $replaceColor[$record['color']];
	$record['genres'] = Strings::split($record['genres'], '~\|~');
	$record['plot_keywords'] = Strings::split($record['plot_keywords'], '~\|~');

	$movie = [];
	$movie['color'] = $record['color'];
	$movie['director_name'] = $record['director_name'] !== '' ? $record['director_name'] : null;
	$movie['num_critic_for_reviews'] = $record['num_critic_for_reviews'] !== '' ? $record['num_critic_for_reviews'] : null;
	$movie['duration'] = $record['duration'] !== '' ? $record['duration'] : null;
	$movie['director_facebook_likes'] = $record['director_facebook_likes'] !== '' ? $record['director_facebook_likes'] : null;
	$movie['gross'] = $record['gross'] !== '' ? $record['gross'] : null;
	$movie['movie_title'] = $record['movie_title'] !== '' ? $record['movie_title'] : null;
	$movie['num_voted_users'] = $record['num_voted_users'] !== '' ? $record['num_voted_users'] : null;
	$movie['num_users_for_reviews'] = $record['num_users_for_reviews'] !== '' ? $record['num_users_for_reviews'] : null;
	$movie['content_rating'] = $record['content_rating'] !== '' ? $record['content_rating'] : null;
	$movie['genres'] = $record['genres'] !== '' ? $record['genres'] : null;
	$movie['plot_keywords'] = $record['plot_keywords'] !== '' ? $record['plot_keywords'] : null;
	$movie['country'] = $record['country'] !== '' ? $record['country'] : null;
	$movie['content_rating'] = $record['content_rating'] !== '' ? $record['content_rating'] : null;

	$movies[] = $movie;
	$genres = array_unique(array_merge($genres, $record['genres']));
	$plotKeywords = array_unique(array_merge($plotKeywords, $record['plot_keywords']));
	$languages = array_unique(array_merge($languages, [$record['language']]));
	$countries = array_unique(array_merge($countries, [$record['country']]));
	$contentRatings = array_unique(array_merge($contentRatings, [$record['content_rating']]));
}

$genreIds = [];
$plotKeywordIds = [];
$languageIds = [];
$countryIds = [];
$contentRatingIds = [];

$connection->beginTransaction();
foreach ($genres as $genre) {
	$connection->insert('genre', ['name' => $genre]);
	$genreIds[$genre] = $connection->lastInsertId();
}
foreach ($languages as $language) {
	$connection->insert('language', ['name' => $language]);
	$languageIds[$language] = $connection->lastInsertId();
}
foreach ($contentRatings as $contentRating) {
	$connection->insert('content_rating', ['name' => $contentRating]);
	$contentRatingIds[$contentRating] = $connection->lastInsertId();
}
foreach ($countries as $country) {
	$connection->insert('country', ['name' => $country]);
	$countryIds[$country] = $connection->lastInsertId();
}
foreach ($plotKeywords as $plotKeyword) {
	$connection->insert('keyword', ['name' => $plotKeyword]);
	$plotKeywordIds[$plotKeyword] = $connection->lastInsertId();
}

$connection->commit();

foreach ($movies as $i => $movie) {
	foreach ($movie['genres'] as $j => $genre) {
		$movies[$i]['genres'][$j] = $genreIds[$genre];
	}
	foreach ($movie['plot_keywords'] as $j => $plotKeyword) {
		$movies[$i]['plot_keywords'][$j] = $plotKeywordIds[$plotKeyword];
	}
	$movies[$i]['content_rating'] = $contentRatingIds[$movie['content_rating']];
	$movies[$i]['language'] = $languageIds[$movie['language']];
	$movies[$i]['country'] = $countryIds[$movie['country']];
}

$connection->beginTransaction();

$movieIds = [];
foreach ($movies as $i => $movie) {
	$movie['content_rating_id'] = $movie['content_rating'];
	$movie['language_id'] = $movie['language'];
	$movie['country_id'] = $movie['country'];
	unset($movie['genres']);
	unset($movie['plot_keywords']);
	unset($movie['content_rating']);
	unset($movie['language']);
	unset($movie['country']);
	$connection->insert('movie', $movie);
	$movieIds[$i] = $connection->lastInsertId();
}

foreach ($movies as $i => $movie) {
	foreach ($movie['genres'] as $genre) {
		$connection->insert('movie_genre', ['movie_id' => $movieIds[$i], 'genre_id' => $genre]);
	}
	foreach ($movie['plot_keywords'] as $keyword) {
		$connection->insert('movie_keyword', ['movie_id' => $movieIds[$i], 'keyword_id' => $keyword]);
	}
}

$connection->commit();

print('data loaded and dumped to sql');
