<?php

namespace JBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


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

        $formBuilder
            ->add('dateRetrait',DateType::class,array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' =>['placeholder'=>'dd-MM-yyyy'],
            ))

            ->add('cardNumber',TextType::class)
            ->add('crypto',TextType::class)
            ->add('dateExp',DateType::class,array(
                'widget' => 'single_text',
                'format' => 'MM-yyyy',
                'attr' =>['placeholder'=>'MM-yyyy'],
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
