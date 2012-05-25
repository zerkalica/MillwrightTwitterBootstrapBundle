<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LegendFormTypeExtension extends AbstractTypeExtension
{
    private $render_fieldset;
    private $show_legend;
    private $show_child_legend;

    public function __construct(array $options){
        $this->render_fieldset   = $options['render_fieldset'];
        $this->show_legend       = $options['show_legend'];
        $this->show_child_legend = $options['show_child_legend'];
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view->setVars(array(
            'render_fieldset'   => $options['render_fieldset'],
            'show_legend'       => $options['show_legend'],
            'show_child_legend' => $options['show_child_legend'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolover->setDefaults(array(
            'render_fieldset'   => $this->render_fieldset,
            'show_legend'       => $this->show_legend,
            'show_child_legend' => $this->show_child_legend,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
