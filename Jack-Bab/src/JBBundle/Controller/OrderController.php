<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:order.html.twig');
    }
}
