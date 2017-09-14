<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaymentController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:payment.html.twig');
    }
}
