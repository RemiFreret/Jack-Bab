<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JBBundle\Entity\Commande;

class InventoryController extends Controller
{
    public function indexAction(Request $request)
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
        $month = $request->get('month');
        $year = $request->get('year');
        if($year && $month){
            if($day = $request->get('day')){
                $listeCommande = $repository->findByDay(new \DateTime("$year-$month-$day T00:00:00"));
            }else{
                $listeCommande = $repository->findByMonth($year,$month);
            }
        }

        return $this->render('JBBundle:Default:inventory.html.twig',array('listeCommande' => $listeCommande));
    }
}
