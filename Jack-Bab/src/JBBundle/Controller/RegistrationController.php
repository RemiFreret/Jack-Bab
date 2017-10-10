<?php

namespace JBBundle\Controller;

use JBBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:registration.html.twig');
    }

    public function inscriptionAction(Request $request)
    {
        // Init
        $em = $this->getDoctrine()->getManager();
        $user = new User();

        // Password encryption
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($request->get('password'), "AzErTy123");

        // Creating the user
        $user->setPassword($password);
        $user->setLastName($request->get('lastname'));
        $user->setFirstName($request->get('firstname'));
        $user->setEmail($request->get('email'));

        // Executing the query on database
        $em->persist($user);
        $em->flush();

        //return $this->render('JBBundle:Default:registration.html.twig');
        return $this->redirectToRoute('jb_homepage');
    }
}
