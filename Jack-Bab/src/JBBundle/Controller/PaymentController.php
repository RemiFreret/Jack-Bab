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
        $test = $this->get('session')->getFlashBag();
        foreach ($test->get("commandeId") as $message) {
        }
        return $this->render('JBBundle:Default:payment.html.twig');
    }
}
