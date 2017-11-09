<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

        $listeCommande = $repository->findNext();

        return $this->render('JBBundle:Default:commandlist.html.twig',array('listeCommande' => $listeCommande));
    }

    public function statusAction(Request $request){
        $user = $this->get('session')->get('user');
        if(!$user || $user['rights'] == 0){
            return $this->redirectToRoute('jb_homepage');
        }

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;
        $toUpdate = $em->getRepository('JBBundle:Commande')->find($request->get('id'));

        if (!$toUpdate) {
            throw $this->createNotFoundException(
                'No commande found for id '.$toUpdate->get('id')
            );
        }

        if($toUpdate->getState()<2){
            $toUpdate->setState($toUpdate->getState()+1);
            $em->flush();
        }

        return $this -> redirectToRoute('jb_commandlist');
    }
}
