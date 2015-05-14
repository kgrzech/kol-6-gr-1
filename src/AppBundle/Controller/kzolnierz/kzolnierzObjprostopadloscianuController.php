<?php
namespace AppBundle\Controller\kzolnierz;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\kzolnierzObjprostopadloscianuType;
use kzolnierz\Tools\Objprostopadloscianu;
class kzolnierzObjprostopadloscianuController extends Controller
{
    /**
     * @Route("/kzolnierz/Objprostopadloscian/show/form", name="kzolnierz_Objprostopadloscian_show_form")
     */
    public function showFormAction()
    {
        $objprostopadloscianu = new Objprostopadloscianu();
        $form = $this->createCreateForm($objprostopadloscianu);
        return $this->render(
            'AppBundle:kzolnierzObjprostopadloscianu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/kzolnierz/Objprostopadloscianu/calc", name="kzolnierz_objprostopadloscianu_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $objprostopadloscianu = new Objprostopadloscianu();
        $form = $this->createCreateForm($objprostopadloscianu);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:kzolnierzObjprostopadloscianu:wynik.html.twig',
                array('wynik' => $objprostopadloscianu->obj())
            );
        }
        return $this->render(
            'AppBundle:kzolnierzObjprostopadloscianu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Objprostopadloscianu $objprostopadloscianu The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Objprostopadloscianu $objprostopadloscianu)
    {
        $form = $this->createForm(new kzolnierzObjprostopadloscianuType(), $objprostopadloscianu, array(
            'action' => $this->generateUrl('kzolnierz_objprostopadloscianu_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}