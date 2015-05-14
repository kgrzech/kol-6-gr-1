<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RafalNavCuboidType;
use RafalNav\Tools\RafalNavCuboid;
class RafalNavCuboidController extends Controller
{
    /**
     * @Route("/rafalnav/cuboid/show/form", name="rafalnav_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new RafalNavCuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:RafalNavCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/rafalnav/cuboid/calc", name="rafalnav_cuboid_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new RafalNavCuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:RafalNavCuboid:wynik.html.twig',
                array('wynik' => $cuboid->field())
            );
        }
        return $this->render(
            'AppBundle:RafalNavCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param RafalNavCuboid $cuboid The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RafalNavCuboid $cuboid)
    {
        $form = $this->createForm(new RafalNavCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('rafalnav_cuboid_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}