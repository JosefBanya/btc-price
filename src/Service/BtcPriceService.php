<?php

namespace App\Service;

use App\Http\Client;
use App\Object\ExchangePair;

class BtcPriceService
{

	/**
	 * @param Client $client
	 */
	public function __construct(
		private Client $client
	)
	{}

	/**
	 * @return null|array<ExchangePair>
	 */
	public function getPairs(): ?array
	{
		$data = $this->client->call('https://blockchain.info/ticker', Client::METHOD_GET);

		if ($data['status'] === Client::RESPONSE_STATUS_OK) {

			$collection = [];

			asort($data['data']);

			foreach ($data['data'] as $pairName => $rawPair) {
				$pair = new ExchangePair(name: 'BTC/'. $pairName, price: $rawPair['last'], sell: $rawPair['sell'], buy: $rawPair['buy'], symbol: $rawPair['symbol']);
				$collection[] = $pair;
			}

			return $collection;
		}

		return null;
	}

	public function getPairsAsArray(): ?array
	{
		return array_map(function (ExchangePair $pair) {
			return $pair->__toArray();
		}, $this->getPairs());
	}
}