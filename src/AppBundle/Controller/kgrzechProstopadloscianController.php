<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\kgrzechProstopadloscianType;
use kgrzech\Tools\Prostopadloscian;

class kgrzechProstopadloscianController extends Controller
{
    /**
     * @Route("/kgrzech/Prostopadloscian/show/form", name="kgrzech_Prostopadloscian_show_form")
     */
    public function showFormAction()
    {
        $Prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($Prostopadloscian);
        return $this->render(
            'AppBundle:kgrzechProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/kgrzech/Prostopadloscian/calc", name="kgrzech_Prostopadloscian_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $Prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($Prostopadloscian);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:kgrzechProstopadloscian:wynik.html.twig',
                array('wynik' => $Prostopadloscian->objetosc())
            );
        }
        return $this->render(
            'AppBundle:kgrzechProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Prostopadloscian $Prostopadloscian The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prostopadloscian $Prostopadloscian)
    {
        $form = $this->createForm(new kgrzechProstopadloscianType(), $Prostopadloscian, array(
            'action' => $this->generateUrl('kgrzech_Prostopadloscian_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}