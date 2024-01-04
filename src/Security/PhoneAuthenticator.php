<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class PhoneAuthenticator extends AbstractAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app.home';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private  TokenStorageInterface $tokenStorage,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function supports(Request $request): ?bool
    {
        // continue ONLY if the current ROUTE matches the check ROUTE
        return true;
    }

    public function authenticate(Request $request): Passport
    {
        $phone = $request->request->get('phone', '');
        $accessToken = $this->tokenStorage->getToken();

        $code = $request->get('country');
        $phone = $request->get('phone');
        if ($accessToken == null)
            $accessToken = "";

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $phone);
        //$userID=$accessToken->getUser()->getId;
        return new SelfValidatingPassport(
            new UserBadge($phone, function () use ( $phone) {
                /** @var User $user **/
                // 1) have they logged in with Facebook before? Easy!
                $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['phone' => $phone]);
                
                if ($existingUser) {
                    return $existingUser;
                }

                $user = new User();

                // 3) Maybe you just want to "register" them by creating
                // a User object                
                /*$user->setSocialId($facebookUser->getId());
                $user->setName($facebookUser->getLastName());
                $user->setFirstName($facebookUser->getFirstName());
                $user->setEmail($facebookUser->getEmail());
                $user->setPassword("auth_facebook");
                $user->setAvatar($facebookUser->getPictureUrl());
                $this->entityManager->persist($user);*/
                dd($user);
                $this->entityManager->flush();

                return $user;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        /*  if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        } */

        // On redirige vers la page d'accueil si pas d'authentication correcte 
        return new RedirectResponse($this->urlGenerator->generate('app.home'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        return new RedirectResponse($this->urlGenerator->generate('app.home'));
    }



    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
