<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JBBundle\Entity\Message;
/*
 * Controller for the contact page. Display the contact and golden book. Also
 * register new entries
 */
class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        //Get EntityManager
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;
        //Get Repository
        $repository = $em
            ->getRepository('JBBundle:Message')
        ;

        //Getting parameters from request
        $email = $request->get('email');
        $title = $request->get('title');
        $message = $request->get('message');
        $time = new \DateTime;

        //If all parameters are set, register and flush message
        if($email && $title && $message && $time){
            $mess = new Message();
            $mess->setEmail($email);
            $mess->setTitle($title);
            $mess->setMessage($message);
            $mess->setTime($time);
            $em->persist($mess);
            $em->flush();
        }
        //Find the last ten message
        $listeMessage = $repository->findLast();

        return $this->render('JBBundle:Default:contact.html.twig',array('listeMessage' => $listeMessage));
    }
}
