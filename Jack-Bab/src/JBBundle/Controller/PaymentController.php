<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use JBBundle\Entity\Commande;

class PaymentController extends Controller
{
    public function indexAction()
    {
        $commandeId = $this->get('session')->getFlashBag()->get('commandeId');
        if(!$commandeId){
            return $this->redirectToRoute('jb_homepage');
        }
        foreach( $commandeId as $message){
            $commande = [];
            $commandeItem = $this->getDoctrine()->getManager()->getRepository('JBBundle:Commande')->find($message);
            $commande['firstName'] = $commandeItem->getFirstName();
            $commande['lastName'] = $commandeItem->getLastName();
            $commande['email'] = $commandeItem->getEmail();
            $commande['id'] = $commandeItem->getId();
        }
        $this->get('session')->set('panier', array());
        return $this->render('JBBundle:Default:payment.html.twig',array('commande' => $commande));
    }
}
