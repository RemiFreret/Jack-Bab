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

        $formBuilder
            ->add('email',EmailType::class)
            ->add('firstName',TextType::class)
            ->add('lastName',TextType::class)

            ->add('dateRetrait',DateType::class)

            ->add('cardNumber',TextType::class)
            ->add('crypto',TextType::class)
            ->add('dateExp',DateType::class)

            ->add('Valider',SubmitType::class)
        ;

        $form = $formBuilder->getForm();


        if($request->isMethod('POST')){

            $form->handleRequest($request);
            if($form->isValid()){
                return $this->redirectToRoute('jb_payment',array('commande'=>$commande));
            }
        }

        return $this->render('JBBundle:Default:order.html.twig',array(
            'form' => $form->createView(),
        ));
    }
}
