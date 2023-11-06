<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

class GoogleController extends AbstractController
{
    #[Route('/google/connect', name: 'google.connect')]
    public function google_connect(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry->getClient('google')->redirect([], []);
    }
    
    #[Route('/google/check', name: 'google.check')]
    public function google_check(Request $request)
    {
        
    }
}
