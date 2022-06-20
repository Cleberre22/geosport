<?php

namespace App\Controller;

use App\Repository\ClubRepository;
use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(clubRepository $clubRepository, SportRepository $sportRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'club' => $clubRepository->findAll(),
            'sport' => $sportRepository->findAll(),
        ]);
    }
}
