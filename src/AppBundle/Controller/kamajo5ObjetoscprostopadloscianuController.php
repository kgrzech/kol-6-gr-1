<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\kamajo5ObjetoscprostopadloscianuType;
use kamajo5\Tools\Objetoscprostopadloscianu;
class kamajo5ObjetoscprostopadloscianuController extends Controller
{
    /**
     * @Route("/kamajo5/objetoscp/show/form", name="kamajo5_objetoscp_show_form")
     */
    public function showFormAction()
    {
        $objetoscprostopadloscianu = new Objetoscprostopadloscianu();
        $form = $this->createCreateForm($objetoscprostopadloscianu);
        return $this->render(
            'AppBundle:kamajo5Objetoscprostopadloscianu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
   /**
     * @Route("/kamajo5/objetoscp/calc", name="kamajo5_objetoscp_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $objetoscprostopadloscianu = new Objetoscprostopadloscianu();
        $form = $this->createCreateForm($objetoscprostopadloscianu);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:kamajo5Objetoscprostopadloscianu:wynik.html.twig',
                array('wynik' => $objetoscprostopadloscianu->objetosc())
            );
        }
        return $this->render(
            'AppBundle:kamajo5Objetoscprostopadloscianu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Objetoscprostopadloscianu $objetoscprostopadloscianu The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Objetoscprostopadloscianu $objetoscprostopadloscianu)
    {
        $form = $this->createForm(new kamajo5ObjetoscprostopadloscianuType(), $objetoscprostopadloscianu, array(
            'action' => $this->generateUrl('kamajo5_objetoscp_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
} 
