<?php

namespace App\Controller;

use App\Modell\Starship;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(LoggerInterface $logger): Response
    {
        dd($logger);
        $starships = [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q',
            ),
            new Starship(
                2,
                'USS Espresso (NCC-0001)',
                'Latte',
                'James T. Quick!',
                'Repaired',
            ),
            new Starship(
                3,
                'USS Wanderlust  (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'Under Construction',
            ),        
        ];

        return $this->json($starships);

    }
}