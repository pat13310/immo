<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/property', name: 'property.')]

class PropertyController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('property/add.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }
    #[Route('/add', name: 'add')]
    public function add(): Response
    {
        return $this->render('property/add.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }
}
