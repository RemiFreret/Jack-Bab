<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:registration.html.twig');
    }
}
