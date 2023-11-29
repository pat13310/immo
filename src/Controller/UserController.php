<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormNameType;
use App\Form\FormMailType;
use App\Form\FormPhoneType;
use App\Service\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/user', name: 'user.')]
class UserController extends AbstractController
{
    use \App\Entity\Trait\LangagesAndDevisesTrait;

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        $langages = $this->langagesRepository->findAllLangages();
        return $this->render('user/dashboard.html.twig', [
            'langages' => $langages,
        ]);
    }

    #[Route('/infos', name: 'infos')]
    public function infos(Request $request, Factory $factory, EntityManagerInterface $em): Response
    {
        $user =$this->getUser();
        
        $formName = $this->createForm(FormNameType::class);
        $formName->handleRequest($request);
        //
        $formMail = $this->createForm(FormMailType::class);
        $formMail->handleRequest($request);
        //
        $formTel = $this->createForm(FormPhoneType::class);
        $formTel->handleRequest($request);
        
        if ($factory->isValid($formName)) {
            $formData = $formName->getData();           
            $email = $user->getUserIdentifier();
            if ($user!==null){
                
                //$user->setEmail($formData->get('email'));
                $em->persist($user);
                $em->flush();
            }
            return $this->redirectToRoute('user.infos');
        }

        if ($factory->isValid($formMail)) {
            $formData = $formMail->getData();
            dd($formData);
            return $this->redirectToRoute('user.infos');
        }
        if ($factory->isValid($formTel)) {
            $formData = $formTel->getData();
            dd($formData);
            return $this->redirectToRoute('user.infos');
        }


        return $this->render('user/infos.html.twig', [
            'formName' => $formName->createView(),
            'formMail' => $formMail->createView(),
            'formTel' => $formTel->createView(),
        ]);
    }

    

}
