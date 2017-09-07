<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('jb_homepage', new Route('/', array(
    '_controller' => 'JBBundle:Default:index',
)));

return $collection;
