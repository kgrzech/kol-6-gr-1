<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\pjakimiakProstopadloscianType;
use pjakimiak\Tools\Prostopadloscian;

class pjakimiakProstopadloscianController extends Controller
{
    /**
     * @Route("/pjakimiak/prostopadloscian/show/form", name="pjakimiak_prostopadloscian_show_form")
     */
    public function showFormAction()
    {
        $prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($prostopadloscian);
        return $this->render(
            'AppBundle:pjakimiakProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/pjakimiak/prostopadloscian/calc", name="pjakimiak_prostopadloscian_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($prostopadloscian);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:pjakimiakProstopadloscian:wynik.html.twig',
                array('wynik' => $prostopadloscian->objetosc())
            );
        }
        return $this->render(
            'AppBundle:pjakimiakProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Prostopadloscian $prostopadloscian The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prostopadloscian $prostopadloscian)
    {
        $form = $this->createForm(new pjakimiakProstopadloscianType(), $prostopadloscian, array(
            'action' => $this->generateUrl('pjakimiak_prostopadloscian_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}