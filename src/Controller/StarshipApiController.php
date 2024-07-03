<?php

namespace App\Controller;

use App\Modell\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]   // methods: ['GET'])] restringir peticiones a GET
    public function getCollection(StarshipRepository $repository): Response // link: StarshipRepository $repository
    {
     //   dd($repository);  //Check working function
        $starships = $repository->findAll();

        return $this->json($starships);

    }


    #[Route('/{id<\d+>}', methods: ['GET'])]     //{id} is a wildcard cualquier direccion dara un resultado 
    public function get(int $id, StarshipRepository $repository): Response       //{id<\d+>} restringe los valores a numeros enteros
    {
        $starship = $repository->find($id);

        if(!$starship){
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}