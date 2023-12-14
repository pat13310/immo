<?php

namespace App\Controller;

use DateTime;
use App\Entity\Card;
use App\Entity\User;
use App\Entity\Extra;
use App\Service\Factory;
use App\Form\FormMailType;
use App\Form\FormNameType;
use App\Form\GiftFormType;
use App\Form\FormPhoneType;
use App\Form\CouponFormType;
use App\Form\PaymentFormType;
use App\Repository\CardRepository;
use App\Form\PaymentMethodFormType;
use App\Repository\ExtraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/user', name: 'user.')]
class UserController extends AbstractController
{
    use \App\Entity\Trait\LangagesAndDevisesTrait;

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        //$langages = $this->langagesRepository->findAllLangages();
        return $this->render('user/dashboard.html.twig', [
            /*  'langages' => $langages,*/]);
    }

    #[Route('/infos', name: 'infos')]
    public function infos(Request $request, Factory $factory, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

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
            if ($user !== null) {
                dd($user);
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

    #[Route('/payment', name: 'payment')]
    public function payment(
        Request $request,
        Factory $factory,
        EntityManagerInterface $em,
        CardRepository $cardRepository,
        ExtraRepository $couponRepo,
    ): Response {
        $user = $this->getUser();
        $paymentForm = $this->createForm(PaymentFormType::class);
        $paymentForm->handleRequest($request);

        $couponForm = $this->createForm(CouponFormType::class);
        $couponForm->handleRequest($request);

        if ($factory->isValid($couponForm) && $user) {
            $formData = $couponForm->getData();
            if ($user->getExtra() == null) {
                $coupon = new Extra();
                $coupon->setUser($user);
                $coupon->setCouponCode($formData['coupon_code']);
            } else {
                $coupon = $couponRepo->findByUser($user->getId());
            }
            $em->persist($coupon);
            $em->flush();
        }
        if ($factory->isValid($paymentForm) && $user) {
            $formData = $paymentForm->getData();

            if ($user->getCard() == null) {
                $card = new Card();
            } else {
                $card = $cardRepository->findByUser($user->getId());
            }
            $card->setUser($user);
            $numberCard=$formData['numberCard'];
            $date = $formData['expireDate'];
            $dateTime = null;
            if ((str_contains($date, '_') === false) && (str_contains($numberCard, '_') === false)) {
                $date = "01/" . $date;
                $dateTime = new DateTime($date);
                //
                $card->setNumberCard($numberCard);
                $card->setExpireDate($dateTime);
                $card->setCrypto((int)$formData['crypto']);
                $card->setCp((int)$formData['codePostal']);
                //
                $em->persist($card);
                $em->flush();
            }
        }
        return $this->render('user/payment.html.twig', [
            'paymentForm' => $paymentForm->createView(),
            'couponForm' => $couponForm->createView(),
        ]);
    }

    #[Route('/payment/info', name: 'payment.info')]
    public function payment_info(
        Request $request
    ): Response {
        return $this->render('user/payment_info.html.twig', []);
    }

    #[Route('/payment/gift', name: 'payment.gift')]
    public function payment_gift(
        Request $request,
        Factory $factory,
        EntityManagerInterface $em,
        ExtraRepository  $giftRepository
    ): Response {
        $user = $this->getUser();
        $giftForm = $this->createForm(GiftFormType::class);
        $giftForm->handleRequest($request);

        if ($factory->isValid($giftForm) && $user) {

            if ($user->getExtra() == null) {
                $giftCard = new Extra();
                $giftCard->setUser($user->getId());
            } else {
                $giftCard = $giftRepository->findByUser($user->getId());
            }
            $formData = $giftForm->getData();
            dd($formData);
            $giftCard->setGiftCode($formData['giftCode']);
            $em->persist($giftCard);
            $em->flush();
        }

        return $this->render('user/payment_gift.html.twig', [
            "giftForm" => $giftForm->createView(),
        ]);
    }


    #[Route('/payment/payout-method', name: 'payment.method')]
    public function payment_method(
        Request $request,
        Factory $factory,
       
        EntityManagerInterface $em,
        ExtraRepository  $giftRepository
    ): Response {
        
        $user = $this->getUser();
        $langages=$this->getAllLangages();
        $paymentMethodForm = $this->createForm(PaymentMethodFormType::class);
        $paymentMethodForm->handleRequest($request);
        if ($factory->isValid($paymentMethodForm) && $user) {
            dd($request);
        }
        return $this->render('user/payment_method.html.twig', [
            "paymentMethodForm" => $paymentMethodForm->createView(),
            "langages" => $langages,
        ]);
    }

    #[Route('/payment/payout-method/add', name: 'payment.method.add')]
    public function payment_method_add(
        Request $request,
        Factory $factory,
               
    ): Response {
        
        $user = $this->getUser();
        dd($request);
        $paymentMethodForm = $this->createForm(PaymentMethodFormType::class);
        $paymentMethodForm->handleRequest($request);
        
        if ($factory->isValid($paymentMethodForm) && $user) {
            $data=$paymentMethodForm->getData();
            dd($data);
            return$this->redirectToRoute('payment.owner');
        }

        return $this->render('user/payment_method_add.html.twig', [
            "paymentMethodForm" => $paymentMethodForm->createView(),           
        ]);
    }

    #[Route('/payment/owner', name: 'payment.owner')]
    public function payment_owner(
        Request $request,
        Factory $factory,
       
        
    ): Response {
        $user = $this->getUser();
        $paymentMethodForm = $this->createForm(PaymentMethodFormType::class);
        $paymentMethodForm->handleRequest($request);
        
        if ($factory->isValid($paymentMethodForm) && $user) {
        
        }

        return $this->render('user/payment_owner.html.twig', [
            "paymentMethodForm" => $paymentMethodForm->createView(),           
        ]);
    }
}
