<?php

namespace JBBundle\Controller;

use JBBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends DefaultController
{
    public function indexAction()
    {

        $product = $this->getDoctrine()
          ->getRepository(Product::class)
          ->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        return $this->render('JBBundle:Default:shop.html.twig', array(
                      'produits' => $product,
                    ));
    }
}
