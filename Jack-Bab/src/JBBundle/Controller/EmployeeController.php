<?php

namespace JBBundle\Controller;

use JBBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->get('session')->get('user');
        if(!$user || $user['rights'] == 0 || $user['rights'] == 1){
            return $this->redirectToRoute('jb_homepage');
        }

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $repository = $em
            ->getRepository('JBBundle:User')
        ;
        $email = $request->get('email');
        $rights = $request->get('rights');

        if($email){
            $userArray = $repository->findByEmail($email);
            $currentUser = null;
            foreach($userArray as $i){
                $currentUser = $i;
            }
            if($currentUser){
                if($rights && ($rights == 1 || $rights == 2 || $rights == 0)){
                    $currentUser->setRights($rights);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add("modif","Les droits en été mis à jour");
                }
            }
        }

        return $this->render('JBBundle:Default:employee.html.twig',array('email'=> $email));
    }
}
