<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\vincentiCuboidType;
use vincenti\Tools\Cuboid;

class vincentiCuboidController extends Controller
{
    /**
     * @Route("/vincenti/cuboid/show/form", name="vincenti_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:vincentiCuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/vincenti/cuboid/calc", name="vincenti_cuboid_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:vincentiCuboid:wynik.html.twig',
                array('wynik' => $cuboid->sum())
            );
        }
        return $this->render(
            'AppBundle:vincentiCuboid:form.html.twig',
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
        $form = $this->createForm(new vincentiCuboidType(), $cuboid, array(
            'action' => $this->generateUrl('vincenti_cuboid_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}