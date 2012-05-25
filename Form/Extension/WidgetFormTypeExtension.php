<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\CreationException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetFormTypeExtension extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(!is_array($options['widget_addon'])){
            throw new CreationException("The 'widget_addon' option must be an array");
        }
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view->setVars(array(
            'widget_control_group' => $options['widget_control_group'],
            'widget_controls' => $options['widget_controls'],
            'widget_addon' => $options['widget_addon'],
            'widget_prefix' => $options['widget_prefix'],
            'widget_suffix' => $options['widget_suffix'],
            'widget_type' =>  $options['widget_type'],
            'widget_control_group_attr' => $options['widget_control_group_attr'],
            'widget_controls_attr' =>  $options['widget_controls_attr'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolover->setDefaults(array(
            'widget_control_group' => true,
            'widget_controls' => true,
            'widget_addon' => array(
                'append' => false,
                'icon' => null,
                'text' => null,
            ),
            'widget_prefix' => null,
            'widget_suffix' => null,
            'widget_type' => '',
            'widget_control_group_attr' => array(),
            'widget_controls_attr' => array(),
        ));
        $resolver->setAllowedValues(array(
            'widget_type' => array(
                'inline',
                '',
            )
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
