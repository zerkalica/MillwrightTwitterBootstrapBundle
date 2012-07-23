<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContextFormTypeExtension extends AbstractTypeExtension
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'context' => array(),
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
