<?php

namespace App\Controller;

use App\Repository\DeviseRepository;
use App\Repository\LangagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    use \App\Entity\Trait\LangagesAndDevisesTrait;    

    #[Route('/', name: 'app.home')]
    public function index(Request $request): Response
    {
        $login = $request->query->get('login');
        if ($login===null){
            $login="hide";            
        }
        //dd($login);

        $langages = $this->langagesRepository->findAllLangages();
        $favorites = $this->langagesRepository->findFavorites();
        $devises = $this->deviseRepository->findAll();

        return $this->render('home/index.html.twig', [
            'langages' => $langages,
            'favorites' => $favorites,
            'devises' => $devises,
            'login'=>$login,
        ]);
    }

  /*   #[Route('/login', name: 'app.login')]
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
    } */
}
