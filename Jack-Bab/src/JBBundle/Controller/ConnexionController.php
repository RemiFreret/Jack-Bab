<?php

namespace JBBundle\Controller;

use JBBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:connexion.html.twig');
    }

    public function commandindexAction()
    {

        return $this->render('JBBundle:Default:commandconnexion.html.twig');
    }

    public function connectionAction(Request $request)
    {
        $user = $this->getDoctrine()
          ->getRepository(User::class)
          ->findOneBy(
              array('email' => $request->get('inputEmail'))
          );

        if (!$user) { // Si le mail est pas correct
            return $this->render('JBBundle:Default:commandconnexion.html.twig');
        }
        else { // Vérification du mot de passe
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $salt = uniqid(mt_rand(), true);
            $valid = $encoder->isPasswordValid($user->getPassword(), $request->get('inputPassword'), $user->getSalt());

            if (!$valid) { // Si le mdp est pas correct
                return $this->render('JBBundle:Default:commandconnexion.html.twig');
            }
            else {
                $session = $this->get('session');
                $session->set('user',
                    array('firstName' => $user->getFirstName(), 'lastName' => $user->getLastName(), 'email' => $user->getEmail())
                );
                return $this->redirectToRoute('jb_homepage');
            }
        }
    }
}
