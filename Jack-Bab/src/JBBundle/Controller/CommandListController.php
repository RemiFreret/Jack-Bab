<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandListController extends DefaultController
{
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('JBBundle:Commande')
        ;

        $listeCommande = $repository->findAll();

        return $this->render('JBBundle:Default:commandlist.html.twig',array('listeCommande' => $listeCommande));
    }
}
