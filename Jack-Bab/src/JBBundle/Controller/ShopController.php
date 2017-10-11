<?php

namespace JBBundle\Controller;


use JBBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends DefaultController
{
    public function indexAction()
    {
      $session = $this->get('session');
      if (!$session->has('panier')) {
        $session->set('panier', array());
      }

        $product = $this->getDoctrine()
          ->getRepository(Product::class)
          ->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        foreach ($product as $key => $entity) {
          $entity->setImage(base64_encode(stream_get_contents($entity->getImage())));
        }

        return $this->render('JBBundle:Default:shop.html.twig', array(
                      'produits' => $product,
                    ));
    }

    public function ajoutAction(Request $request)
    {
      $session = $this->get('session');
      $panier = $session->get('panier');

      if ( isset($panier[$request->get('id')]) ) {
        $panier[$request->get('id')]["quantity"] += $request->get('quantity');
        $panier[$request->get('id')]["total"] = $panier[$request->get('id')]["quantity"] * $panier[$request->get('id')]["price"];
      }
      else {
        $panier[$request->get('id')] = array('name' => $request->get('name'),
                                             'description' => $request->get('description'),
                                             'price' => (int) $request->get('price'),
                                             'quantity' => (int) $request->get('quantity'),
                                             'total' => $request->get('price') * $request->get('quantity'));
      }

      $panier["price"] = $this->prix($panier);

      $session->set('panier', $panier);

      return $this->redirectToRoute('jb_homepage');
    }

    public function retirerAction(Request $request)
    {
      $session = $this->get('session');
      $panier = $session->get('panier');
      unset($panier[$request->get('key')]);

      $panier["price"] = $this->prix($panier);

      $session->set('panier', $panier);

      return $this->redirectToRoute('jb_homepage');
    }

    public function viderAction(Request $request)
    {
      $this->get('session')->set('panier', array());
      return $this->redirectToRoute('jb_homepage');
    }

    private function prix($panier)
    {
      $price = 0;
      foreach ($panier as $value) {
        if ( isset($value["quantity"]) ) {
          $price += $value["quantity"] * $value["price"];
        }
      }
      return $price;
    }
}
