<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(StarshipRepository $starshipRepository): Response
    {
        $ships = $starshipRepository->findAll();
    //    $starshipCount = count($ships);  // (a) moved to Twig templates/main/homepage.html.twig
        $myShip = $ships[array_rand($ships)];
      //  dd($myShip);
  
        return $this->render('main/homepage.html.twig', [
      //      'numberOfStarships' => $starshipCount,   //deleted when (a)
            'myShip' => $myShip,
            'ships' => $ships,                         //(a)
        ]);
        
    }
}
