<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\FormException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetCollectionFormTypeExtension extends AbstractTypeExtension
{
    protected $options;

    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        if ($options['widget_add_btn'] != null && !is_array($options['widget_add_btn'])) {
            throw new FormException('The "widget_add_btn" option must be an "array".');
        } elseif ($options['widget_add_btn'] != null) {
            if (isset($options['widget_add_btn']['attr']) && !is_array($options['widget_add_btn']['attr'])) {
                throw new FormException('The "widget_add_btn.attr" option must be an "array".');
            }
            if (!isset($options['widget_add_btn']['attr'])) {
                $options['widget_add_btn']['attr'] = $this->options['widget_add_btn']['attr'];
            }
            if (!isset($options['widget_add_btn']['label']) && !isset($options['widget_add_btn']['icon'])) {
                throw new FormException('Provide either "icon" or "label" to "widget_add_btn"');
            }
            if (!isset($options['widget_add_btn']['icon']) && $this->options['widget_add_btn']['icon'] != null) {
                $options['widget_add_btn']['icon'] = $this->options['widget_add_btn']['icon'];
            }
        }
        if ($options['widget_remove_btn'] != null && !is_array($options['widget_remove_btn'])) {
            throw new FormException('The "widget_remove_btn" option must be an "array".');
        } elseif ($options['widget_remove_btn'] != null) {
            if (isset($options['widget_remove_btn']) && !is_array($options['widget_remove_btn'])) {
                throw new FormException('The "widget_remove_btn" option must be an "array".');
            }
            if (!isset($options['widget_remove_btn']['attr'])) {
                $options['widget_remove_btn']['attr'] = $this->options['widget_remove_btn']['attr'];
            }
            if (!isset($options['widget_remove_btn']['label']) && !isset($options['widget_remove_btn']['icon'])) {
                throw new FormException('Provide either "icon" or "label" to "widget_remove_btn"');
            }
            if (!isset($options['widget_remove_btn']['icon']) && $this->options['widget_remove_btn']['icon'] != null) {
                $options['widget_remove_btn']['icon'] = $this->options['widget_remove_btn']['icon'];
            }
        }
        $view->addVars(array(
            'widget_add_btn'    => $options['widget_add_btn'],
            'widget_remove_btn' => $options['widget_remove_btn'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'widget_add_btn'    => 'add',
            'widget_remove_btn' => null,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
