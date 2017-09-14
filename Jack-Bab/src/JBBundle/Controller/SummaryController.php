<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SummaryController extends DefaultController
{
    public function indexAction()
    {
        return $this->render('JBBundle:Default:summary.html.twig');
    }
}
