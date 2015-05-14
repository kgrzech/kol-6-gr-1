<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\choopakProstopadloscianType;
use choopak\Tools\Prostopadloscian;
class choopakProstopadloscianController extends Controller
{
    /**
     * @Route("/choopak/Prostopadloscian/show/form", name="choopak_Prostopadloscian_show_form")
     */
    public function showFormAction()
    {
        $Prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($Prostopadloscian);
        return $this->render(
            'AppBundle:choopakProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/choopak/Prostopadloscian/calc", name="choopak_Prostopadloscian_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $Prostopadloscian = new Prostopadloscian();
        $form = $this->createCreateForm($Prostopadloscian);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:choopakProstopadloscian:wynik.html.twig',
                array('wynik' => $Prostopadloscian->objetosc())
            );
        }
        return $this->render(
            'AppBundle:choopakProstopadloscian:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Prostopadloscian $Prostopadloscian The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prostopadloscian $Prostopadloscian)
    {
        $form = $this->createForm(new choopakProstopadloscianType(), $Prostopadloscian, array(
            'action' => $this->generateUrl('kustra88_objetoscp_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
} 
