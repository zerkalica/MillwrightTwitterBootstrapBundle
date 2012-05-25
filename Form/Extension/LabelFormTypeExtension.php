<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LabelFormTypeExtension extends AbstractTypeExtension
{
    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view->setVar('label_render', $options['label_render']);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'label_render' => true,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
