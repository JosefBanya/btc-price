<?php

namespace App\Http;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';

	const RESPONSE_STATUS_OK = 1;
	const RESPONSE_STATUS_ERROR = 0;

	public function __construct(
		private HttpClientInterface $client,
	) {}


	public function call(string $url, string $method = self::METHOD_GET): array
	{
		$response = $this->client->request(
			$method,
			$url
		);

		if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 400) {
			return ['status' => self::RESPONSE_STATUS_OK, 'data' => $response->toArray()];
		} else {
			return ['status' => self::RESPONSE_STATUS_ERROR];
		}

	}


}