<?php

namespace App\Object;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class ExchangePair
{
	/**
	 * @param string $name
	 * @param float $price
	 * @param float $sell
	 * @param float $buy
	 * @param string $symbol
	 */
	public function __construct(
		private string $name,
		private float $price,
		private float $sell,
		private float $buy,
		private string $symbol,
	)
	{}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return ExchangePair
	 */
	public function setName(string $name): ExchangePair
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return ExchangePair
	 */
	public function setPrice(float $price): ExchangePair
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getSell(): float
	{
		return $this->sell;
	}

	/**
	 * @param float $sell
	 * @return ExchangePair
	 */
	public function setSell(float $sell): ExchangePair
	{
		$this->sell = $sell;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getBuy(): float
	{
		return $this->buy;
	}

	/**
	 * @param float $buy
	 * @return ExchangePair
	 */
	public function setBuy(float $buy): ExchangePair
	{
		$this->buy = $buy;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSymbol(): string
	{
		return $this->symbol;
	}

	/**
	 * @param string $symbol
	 * @return ExchangePair
	 */
	public function setSymbol(string $symbol): ExchangePair
	{
		$this->symbol = $symbol;
		return $this;
	}

	#[Pure] #[ArrayShape(['name' => "string", 'price' => "float", 'sell' => "float", 'buy' => "float", 'symbol' => "string"])]
	public function __toArray(): array
	{
		return [
			'name' => $this->getName(),
			'price' => $this->getPrice(),
			'sell' => $this->getSell(),
			'buy' => $this->getBuy(),
			'symbol' => $this->getSymbol(),
		];
	}



}