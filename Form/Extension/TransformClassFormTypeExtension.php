<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TransformClassFormTypeExtension extends AbstractTypeExtension
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'transform_class' => null,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
