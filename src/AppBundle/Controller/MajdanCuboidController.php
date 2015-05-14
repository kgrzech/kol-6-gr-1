<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\MajdanCuboidType;
use Majdan\Tools\Cuboid;


class MajdanCuboidController extends Controller
{

    /**
     * @Route("/majdan/cuboid/show/form", name="majdan_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);

        return $this->render(
            'AppBundle:MajdanCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/majdan/cuboid/calc", name="majdan_cuboid_licz")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->render(
                'AppBundle:MajdanCuboid:wynik.html.twig',
                array('wynik' => $cuboid->volume())
            );

        }

        return $this->render(
            'AppBundle:MajdanCuboid:form.html.twig',
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
        $form = $this->createForm(new MajdanCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('majdan_cuboid_licz'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Oblicz'));

        return $form;
    }


}
