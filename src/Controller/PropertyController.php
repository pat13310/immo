<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/property', name: 'property.')]

class PropertyController extends AbstractController
{
    #[Route('/add', name: 'add')]
    public function index(): Response
    {
        return $this->render('property/add.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }
}
