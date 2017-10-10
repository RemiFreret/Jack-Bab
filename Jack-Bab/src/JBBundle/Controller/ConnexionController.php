<?php

namespace JBBundle\Controller;

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

    public function connectionAction()
    {
        return $this->render('JBBundle:Default:commandconnexion.html.twig');
    }
}
