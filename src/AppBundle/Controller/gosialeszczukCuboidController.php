<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\gosialeszczukCuboidType;
use gosialeszczuk\Tools\Cuboid;

class gosialeszczukCuboidController extends Controller
{
    /**
     * @Route("/gosialeszczuk/cuboid/show/form", name="gosialeszczuk_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:gosialeszczukCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/gosialeszczuk/cuboid/calc", name="gosialeszczuk_cuboid_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:gosialeszczukCuboid:wynik.html.twig',
                array('wynik' => $cuboid->objetosc())
            );
        }
        return $this->render(
            'AppBundle:gosialeszczukCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Cuboid $cuboid The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cuboid $cuboid)
    {
        $form = $this->createForm(new gosialeszczukCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('gosialeszczuk_cuboid_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}