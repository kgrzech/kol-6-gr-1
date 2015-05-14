<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\kgrzechCuboidType;
use kgrzech\Tools\kgrzechCuboid;
class kgrzechCuboidController extends Controller
{
    /**
     * @Route("/kgrzech/cuboid/show/form", name="kgrzech_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new kgrzechCuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:kgrzechCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/kgrzech/cuboid/calc", name="kgrzech_cuboid_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new kgrzechCuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:kgrzechCuboid:wynik.html.twig',
                array('wynik' => $cuboid->field())
            );
        }
        return $this->render(
            'AppBundle:kgrzechCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param kgrzechCuboid $cuboid The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(kgrzechCuboid $cuboid)
    {
        $form = $this->createForm(new kgrzechCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('kgrzech_cuboid_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}