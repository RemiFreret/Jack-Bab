<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandListController extends DefaultController
{
    public function indexAction()
    {
        $user = $this->get('session')->get('user');
        if(!$user || $user['rights'] == 0){
            return $this->redirectToRoute('jb_homepage');
        }

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('JBBundle:Commande')
        ;

        $listeCommande = $repository->findAll();

        return $this->render('JBBundle:Default:commandlist.html.twig',array('listeCommande' => $listeCommande));
    }
}
