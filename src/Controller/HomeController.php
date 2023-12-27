<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Factory;

class HomeController extends AbstractController
{
    use \App\Entity\Trait\LangagesAndDevisesTrait;    
    #[Route('/', name: 'app.home')]
    public function index(Request $request,  Factory $factory): Response
    {
        $login = $request->query->get('login');
        $error = $request->query->get('error');
        
        if ($login===null){
            $login="hide";            
        }

        $auth=$this->isGranted('IS_AUTHENTICATED_FULLY');
        
        
        $langages = $this->langagesRepository->findAllLangages();
        $favorites = $this->langagesRepository->findFavorites();
        $devises = $this->deviseRepository->findAll();

        $formMail = $this->createForm(RegistrationFormType::class);
        $formMail->handleRequest($request);

        if ($factory->isValid($formMail)){
            
        }
        
        return $this->render('home/index.html.twig', [
            'langages' => $langages,
            'favorites' => $favorites,
            'devises' => $devises,
            'login'=>$login,
            'registrationForm'=>$formMail,
            'auth'=>$auth,
            'error'=>$error,
        ]);
    }

}
