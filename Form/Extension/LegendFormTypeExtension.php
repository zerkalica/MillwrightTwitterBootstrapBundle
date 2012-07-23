<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LegendFormTypeExtension extends AbstractTypeExtension
{
    private $render_fieldset;
    private $show_legend;
    private $show_child_legend;

    public function __construct(array $options)
    {
        $this->render_fieldset   = $options['render_fieldset'];
        $this->show_legend       = $options['show_legend'];
        $this->show_child_legend = $options['show_child_legend'];
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->addVars(array(
            'render_fieldset'   => $options['render_fieldset'],
            'show_legend'       => $options['show_legend'],
            'show_child_legend' => $options['show_child_legend'],
            'label_render'      => $options['label_render'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'render_fieldset'   => $this->render_fieldset,
            'show_legend'       => $this->show_legend,
            'show_child_legend' => $this->show_child_legend,
            'label_render'      => true,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
