<?php

namespace App\Controller;

use App\Service\BtcPriceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{

	/**
	 * @param BtcPriceService $btcPriceService
	 */
	public function __construct(
		private BtcPriceService $btcPriceService
	)
	{
	}

	#[Route('/')]
	public function renderHomepage(): Response
	{
		return $this->render('homepage.html.twig', [
			'exchangePairs' => $this->btcPriceService->getPairs()
		]);
	}

	#[Route('/update-pairs')]
	public function updatePairs(): JsonResponse
	{
		return $this->json([
			'exchangePairs' => $this->btcPriceService->getPairsAsArray()
		]);
	}

}