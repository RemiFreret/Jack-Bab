<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('jb_homepage', new Route('/', array(
    '_controller' => 'JBBundle:Shop:index',
)));

$collection->add('jb_about', new Route('/about', array(
    '_controller' => 'JBBundle:About:index',
)));

$collection->add('jb_summary', new Route('/summary', array(
    '_controller' => 'JBBundle:Summary:index',
)));

$collection->add('jb_connexion', new Route('/connexion', array(
    '_controller' => 'JBBundle:Connexion:index',
)));

$collection->add('jb_commandconnexion', new Route('/comandconnexion', array(
    '_controller' => 'JBBundle:Connexion:commandindex',
)));

$collection->add('jb_payment', new Route('/payment', array(
    '_controller' => 'JBBundle:Payment:index',
)));

$collection->add('jb_order', new Route('/order', array(
  '_controller' => 'JBBundle:Order:index',
)));

$collection->add('jb_commandlist', new Route('/commandlist', array(
  '_controller' => 'JBBundle:CommandList:index',
)));

$collection->add('jb_registration', new Route('/registration', array(
  '_controller' => 'JBBundle:Registration:index',
)));

$collection->add('jb_contact', new Route('/contact', array(
  '_controller' => 'JBBundle:Contact:index',
)));


return $collection;
