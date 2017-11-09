<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Component\HttpFoundation\Request;

use JBBundle\Entity\Commande;

class OrderController extends Controller
{
    public function indexAction(Request $request)
    {
        $commande = new Commande();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$commande);
        $user = $this->get('session')->get('user');
        if(!$user){
            $formBuilder
                ->add('email',EmailType::class)
                ->add('firstName',TextType::class)
                ->add('lastName',TextType::class)
            ;
        } else {
            $commande->setEmail($user['email']);
            $commande->setFirstName($user['firstName']);
            $commande->setLastName($user['lastName']);
        }

        $commande->setListProduit($this->get('session')->get('panier'));

        $time = new \DateTime();
        $time -> add(\DateInterval::createFromDateString('1920 seconds'));
        $time2 = new \DateTime();
        $time2 -> add(\DateInterval::createFromDateString('1 month'));
        $formBuilder
            ->add('dateRetrait', DateTimeType::class, array(
                'format' => 'yyyy-MM-dd HH:mm',
                'data' => $time,
            ))
            ->add('cardNumber',TextType::class)
            ->add('crypto',TextType::class)
            ->add('dateExp',DateType::class, array(
              'data' => $time2,
            ))


            ->add('Valider',SubmitType::class)
        ;

        $form = $formBuilder->getForm();


        if($request->isMethod('POST')){

            $form->handleRequest($request);

            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($commande);
                $em->flush();
                $this->get('session')->getFlashBag()->add("commandeId",$commande->getId());
                return $this->redirectToRoute('jb_payment');
            }
        }

        return $this->render('JBBundle:Default:order.html.twig',array(
            'form' => $form->createView(),
        ));
    }
}
