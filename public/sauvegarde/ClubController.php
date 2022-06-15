<?php

namespace App\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'club')]
    public function index(ClubRepository $clubCrudRepository): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
            'club' => $clubCrudRepository->findBy([],['name'=>'ASC']),
        ]);
    }

    


    #[Route('/{id}', name: 'club_show', methods: ['GET'])]
    public function show(Club $club): Response
    {
        return $this->render('club/show.html.twig', [
            'club' => $club,
        ]);
    }
}
