<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\CreationException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetFormTypeExtension extends AbstractTypeExtension
{
    private $defaultOptions = array(
        'widget_control_group'      => true,
        'widget_controls'           => true,
        'widget_addon'              => array(
            'icon'   => null,
            'text'   => null,
            'type'   => null,
        ),
        'widget_prefix'             => null,
        'widget_suffix'             => null,
        'widget_type'               => '',
        'widget_control_group_attr' => array(),
        'widget_controls_attr'      => array(),
    );

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (!is_array($options['widget_addon'])) {
            throw new CreationException("The 'widget_addon' option must be an array");
        } else {
            $defaults = $this->defaultOptions;
            $options['widget_addon'] = array_merge( $defaults['widget_addon'], $options['widget_addon']);
        }

        if (array_key_exists('types', $view->vars)) {
            $types = $view->vars['types'];

            if (in_array('percent', $types)) {
                if ($options['widget_addon']['text'] === null && $options['widget_addon']['icon'] === null) {
                    $options['widget_addon']['text'] = '%';
                }
                if ($options['widget_addon']['type'] === null) {
                    $options['widget_addon']['type'] = 'append';
                }
            }
            if (in_array('money', $types)) {
                if ($options['widget_addon']['type'] === null) {
                    $options['widget_addon']['type'] = 'prepend';
                }
            }
        }

        if (($options['widget_addon']['text'] !== null || $options['widget_addon']['icon'] !== null) && $options['widget_addon']['type'] === null) {
            throw new \Exception('You must provide a "type" for widget_addon');
        }

        $vars = array(
            'widget_control_group'      => $options['widget_control_group'],
            'widget_controls'           => $options['widget_controls'],
            'widget_addon'              => $options['widget_addon'],
            'widget_prefix'             => $options['widget_prefix'],
            'widget_suffix'             => $options['widget_suffix'],
            'widget_type'               => $options['widget_type'],
            'widget_control_group_attr' => $options['widget_control_group_attr'],
            'widget_controls_attr'      => $options['widget_controls_attr'],
        );

        $view->vars = array_replace($view->vars, $vars);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults($this->defaultOptions);
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
