<?php

namespace App\Model;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

class ElasticSearchClientFactory {

	/**
	 * @return Client
	 */
	public static function create(): Client {
		$hosts = [
			'http://elastic:changeme@localhost:9200'
		];
		$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
		->setHosts($hosts)      // Set the hosts
		->build();              // Build the client object
		return $client;
	}
}