<?php

namespace App\Controller;

use App\Repository\DeviseRepository;
use App\Repository\LangagesRepository;
use App\Service\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistrationFormType;

class SecurityController extends AbstractController
{
    public function __construct(private Factory $factory, 
    private LangagesRepository $langagesRepository,
    private DeviseRepository $deviseRepository
    ){
        
    }
    
    #[Route(path: '/login', name: 'app.login')]
    public function login(Request $request,AuthenticationUtils $authenticationUtils): Response
    {
        /* $langages = $this->langagesRepository->findAllLangages();
        $favorites = $this->langagesRepository->findFavorites();
        $ devises = $this->deviseRepository->findAll();
        */
        if ($this->getUser()) {
            return $this->redirectToRoute('user.infos');
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->redirectToRoute('app.home', ['error' => $error]);

        /* $formMail = $this->createForm(RegistrationFormType::class);
        $formMail->handleRequest($request);

        if ($this->factory->isValid($formMail)){

        }

        return $this->render('home/index.html.twig', [
            'langages' => $langages,
            'favorites' => $favorites,
            'devises' => $devises,
            'login' => 'show',
            'lastUsername' => $lastUsername,
            'error' => $error,
            'registrationForm'=>$formMail,
        ]); */
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

   
}
