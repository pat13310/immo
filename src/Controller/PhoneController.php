<?php

namespace App\Controller;

use App\Service\Factory;
use App\Repository\DeviseRepository;
use App\Security\PhoneAuthenticator;
use App\Repository\LangagesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PhoneController extends AbstractController
{
    public function __construct(
        private Factory $factory,
        private LangagesRepository $langagesRepository,
        private DeviseRepository $deviseRepository,
        private TokenStorageInterface $tokenStorage
    ) {
    }

    #[Route(path: '/phone/connect', name: 'phone.connect')]
    public function phone_connect(
        Request $request,
        PhoneAuthenticator $phoneAuthenticator
    ): ?Response {
        $phone = $request->request->get("phone");
        $code = $request->request->get("country");

        if ($this->getUser()) {
            return $this->redirectToRoute('app.home');
        }

        try {
            // Authentification
            $passport = $phoneAuthenticator->authenticate($request);
            
            $token = new UsernamePasswordToken($passport->getUser(),  'main', $passport->getUser()->getRoles());
            $this->tokenStorage->setToken($token);

        } catch (AuthenticationException $exception) {
            // Gérez les erreurs d'authentification, si nécessaire
            return $this->redirectToRoute('app.home', ['login' => 'show', 'error' =>  $exception->getMessage()]);
        }

        return $this->redirectToRoute('app.home');
    }
}
