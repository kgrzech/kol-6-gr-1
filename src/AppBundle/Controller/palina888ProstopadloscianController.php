<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\palina888ProstopadloscianType;
use palina888\Tools\palina888ProstopadloscianType;
class palina888ProstopadloscianController extends Controller
{
    /**
     * @Route("/palina888/prostopadloscian/show/form", name="palina888_prostopadloscian_show_form")
     */
    public function showFormAction()
    {
        $prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($prostopadloscian);
        return $this->render(
            'AppBundle:palina888ProstopadloscianType:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/palina888/prostopadloscian/calc", name="palina888_prostopadloscian_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($prostopadloscian);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:palina888ProstopadloscianType:wynik.html.twig',
                    array('wynik' => $prostopadloscian->objetosc())
            );
        }
        return $this->render(
            'AppBundle:palina888ProstopadloscianType:form.html.twig',
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
       $form = $this->createForm(new palina888ProstopadloscianType(), $prostopadloscian, array(
           'action' => $this->generateUrl('palina888_prostopadloscian_wynik'),
            'method' => 'POST',
       ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}
