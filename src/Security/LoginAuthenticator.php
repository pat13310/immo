<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\CustomCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app.login';

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public function authenticate(Request $request): Passport
    {


        if ($request->get('method_validate') === 'mail') {
            $mail = $request->get('email');
            $password = $request->get('password');
            $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $mail);
            return new Passport(
                new UserBadge($mail),
                new PasswordCredentials($password),
                [
                    new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                    new RememberMeBadge(),
                ]
            );
        } else {
            $code = $request->get('country');
            $phone = $request->get('phone');
            $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $phone);
            $badge = $phone;
            $credentials = $phone;
            return new Passport(
                new UserBadge($badge),
                new CustomCredentials(function ($credentials) {
                    dd($credentials);
                }, ""),
                [
                    new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                    new RememberMeBadge(),
                ]

            );
        }
        //$request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $mail);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        // On redirige vers la page d'accueil si pas d'authentication correcte 
        return new RedirectResponse($this->urlGenerator->generate('app.home'));
    }

   /*  public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {  
        return new RedirectResponse($this->urlGenerator->generate('app.home',["login"=>"show","error"=>$exception]));
    }
 */

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
