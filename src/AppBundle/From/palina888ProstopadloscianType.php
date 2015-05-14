<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class palina888ProstopadloscianType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('a')
            ->add('b')
            ->add('h')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
   public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'palina888\Tools\palina888Prostopadloscian'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_palina888_palina888Prostopadloscian';
    }
}