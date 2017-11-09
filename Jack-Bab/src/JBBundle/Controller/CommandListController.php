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

        if($toUpdate->getStatus()<2){
            $toUpdate->setStatus($toUpdate->getStatus()+1);
            $em->flush();
        }

        return redirectToRoute('jb_listcommande');
    }
}
