<?php

namespace App\Controller;

use App\Repository\DeviseRepository;
use App\Repository\LangagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private LangagesRepository $langagesRepository,
        private DeviseRepository $deviseRepository
    ) {
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        $langages = $this->langagesRepository->findAllLangages();
        $favorites = $this->langagesRepository->findFavorites();
        $devises = $this->deviseRepository->findAll();

        return $this->render('home/index.html.twig', [
            'langages' => $langages,
            'favorites' => $favorites,
            'devises' => $devises,
        ]);
    }

    #[Route('/login', name: 'app.login')]
    public function login(): Response
    {
        $langages = $this->langagesRepository->findAllLangages();
        $favorites = $this->langagesRepository->findFavorites();
        $devises = $this->deviseRepository->findAll();

        return $this->render('home/login.html.twig', [
            'langages' => $langages,
            'favorites' => $favorites,
            'devises' => $devises,
        ]);
    }
}
