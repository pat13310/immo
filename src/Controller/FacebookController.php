<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

#[Route('/facebook', name: 'facebook.')]
class FacebookController extends AbstractController
{
    #[Route('/connect', name: 'connect')]
    public function facebook_connect(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry->getClient('facebook')->redirect([], []);
    }
    
    #[Route('/check', name: 'check')]
    public function facebook_check(Request $request)
    {
        
    }
}
