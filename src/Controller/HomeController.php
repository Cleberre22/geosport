<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ClubRepository;
use App\Repository\CountryRepository;
use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ClubRepository $clubRepository, SportRepository $sportRepository, CountryRepository $countryRepository, HttpFoundationRequest $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        // dd($data);
        $sport = $clubRepository->findSearch($data);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'club' => $clubRepository->findSearch($data),
            'sport' => $sportRepository->findAll(),
            'country' => $countryRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
