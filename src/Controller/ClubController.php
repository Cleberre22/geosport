<?php

namespace App\Controller;

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
}
