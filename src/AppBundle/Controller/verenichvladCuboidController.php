<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\verenichvladCuboidType;
use verenichvlad\Tools\Cuboid;

class verenichvladCuboidController extends Controller
{
    /**
     * @Route("/verenichvlad/cuboid/show/form", name="verenichvlad_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:verenichvladCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/verenichvlad/cuboid/calc", name="verenichvlad_cuboid_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:verenichvladCuboid:wynik.html.twig',
                array('wynik' => $cuboid->objetosc())
            );
        }
        return $this->render(
            'AppBundle:verenichvladCuboid:form.html.twig',
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
        $form = $this->createForm(new verenichvladCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('verenichvlad_cuboid_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}