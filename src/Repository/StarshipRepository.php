<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }

    public function findAll(): array
    {
        $this->logger->info('Starship collection retrieved');
        return [
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
    }

    public function find(int $id): ?Starship   //fetch a single starship for an id
    {
        foreach ($this->findAll() as $starship)
        {
            if($starship->getId()===$id)
            {
                return $starship;
            }
        }
        return null;
    }
}