<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:contact.html.twig');
    }
}
