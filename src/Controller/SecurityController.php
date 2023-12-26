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

class SecurityController extends AbstractController
{
    public function __construct(
        private Factory $factory,
        private LangagesRepository $langagesRepository,
        private DeviseRepository $deviseRepository
    ) {
    }

    #[Route(path: '/login', name: 'app.login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('user.infos');
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        //if ($error)
        //    dd($error);
        // last username entered by the user
        //dd($error);
        //$lastUsername = $authenticationUtils->getLastUsername();
        return $this->redirectToRoute('app.home', ['login'=>'show','error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
