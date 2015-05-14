<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\PawkrzoVolumeType;
use Pawkrzo\Tools\Strings\Volume;


class PAwkrzoVolumeController extends Controller
{

    /**
     * @Route("/pawkrzo/volume/show/form", name="pawkrzo_volume_show_form")
     */
    public function showFormAction()
    {
        $c = new Volume();
        $f = $this->createCreateForm($c);

        return $this->render(
            'AppBundle:PawkrzoVolume:form.html.twig',
            array(
                'mojNowyFormularz' => $f->createView()
            )
        );
    }

    /**
     * @Route("/pawkrzo/volume/calc", name="pawkrzo_volume_run")
     * @Method("POST")
     */
    public function volumeAction(Request $request)
    {
        $c = new Convert();
        $f = $this->createCreateForm($c);
        $f->handleRequest($request);

        if ($f->isValid()) {

            return $this->render(
                'AppBundle:PawkrzoVolume:wynik.html.twig',
                array('wynik' => $volume->objetosc())
            );

        }

        return $this->render(
            'AppBundle:PawkrzoVolume:form.html.twig',
            array(
                'mojNowyFormularz' => $f->createView()
            )
        );
    }

    /**
     * Creates a form...
     *
     * @param Convert $convert The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Volume $volume)
    {
        $form = $this->createForm(new PawkrzoVolumeType(), $volume, array(
            'action' => $this->generateUrl('pawkrzo_volume_run'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Oblicz'));

        return $form;
    }

}
