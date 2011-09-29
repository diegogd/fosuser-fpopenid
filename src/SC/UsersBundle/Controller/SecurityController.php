<?php

namespace SC\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Fp\OpenIdBundle\Security\Core\Authentication\Token\OpenIdToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityController extends Controller
{
    public function loginAction()
    {        
        $tokenPersister = $this->get('fp_openid.security.authentication.token_persister');

        $token = $tokenPersister->get();

        $um = $this->get('fos_user.user_manager');
        $email = $token->getAttribute('contact/email');
        $user = $um->findUserBy( array('email'=> $email ) );

        if( $user ){
            // IMPORTANT: It is required to set a user to token (UserInterface)
            $newToken = new OpenIdToken($token->getIdentifier(), $user->getRoles());
            $newToken->setUser($user);
            
            $tokenPersister->set($newToken); 

            return $this->redirect($this->generateUrl('fos_user_security_check', array('openid_approved' => 1)));
        } else {
            $this->getRequest()->getSession()->setFlash('error', 'Usuario inexistente');
            return $this->redirect($this->generateUrl('fos_user_security_login', array('openid_approved' => 0)));
        }
    }
}
