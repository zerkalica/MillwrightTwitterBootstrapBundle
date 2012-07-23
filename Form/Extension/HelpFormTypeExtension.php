<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HelpFormTypeExtension extends AbstractTypeExtension
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $vars = array(
            'help_inline' => $options['help_inline'],
            'help_block'  => $options['help_block'],
            'help_label'  => $options['help_label'],
            'help_legend' => $options['help_legend'],
        );

        array_replace($view->vars, $vars);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'help_inline' => null,
            'help_block'  => null,
            'help_label'  => null,
            'help_legend' => null,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
