<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandListController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:connexion.html.twig');
    }
}
