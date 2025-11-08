<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function index(StarshipRepository $starshipRepository): Response
    {
        $starships = $starshipRepository->findAll();

        $myStarship = $starships[array_rand($starships)];

        return $this->render('main/index.html.twig', [
            'myShip' => $myStarship,
            'ships' => $starships,
        ]);
    }
}
