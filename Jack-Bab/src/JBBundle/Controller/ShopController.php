<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:shop.html.twig');
    }
}
