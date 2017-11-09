<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('jb_homepage', new Route('/', array(
    '_controller' => 'JBBundle:Shop:index',
)));

$collection->add('jb_ajoutPanier', new Route('/add', array(
    '_controller' => 'JBBundle:Shop:ajout',
)));

$collection->add('jb_retirerPanier', new Route('/remove', array(
    '_controller' => 'JBBundle:Shop:retirer',
)));

$collection->add('jb_viderPanier', new Route('/vider', array(
    '_controller' => 'JBBundle:Shop:vider',
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

$collection->add('jb_connexionVerif', new Route('/connexionVerif', array(
    '_controller' => 'JBBundle:Connexion:connection',
)));

$collection->add('jb_commandconnexion', new Route('/commandconnexion', array(
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

$collection->add('jb_commandliststatus', new Route('/commandliststatus', array(
  '_controller' => 'JBBundle:CommandList:status',
)));

$collection->add('jb_registration', new Route('/registration', array(
  '_controller' => 'JBBundle:Registration:index',
)));

$collection->add('jb_registrationValidate', new Route('/registrationvalidate', array(
  '_controller' => 'JBBundle:Registration:inscription',
)));

$collection->add('jb_contact', new Route('/contact', array(
  '_controller' => 'JBBundle:Contact:index',
)));

$collection->add('jb_employee', new Route('/employee', array(
  '_controller' => 'JBBundle:Employee:index',
)));

$collection->add('jb_inventory', new Route('/inventory', array(
  '_controller' => 'JBBundle:Inventory:index',
)));

return $collection;
