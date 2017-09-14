<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:about.html.twig');
    }
}
