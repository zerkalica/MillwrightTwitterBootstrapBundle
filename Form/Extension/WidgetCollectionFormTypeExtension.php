<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\CreationException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetCollectionFormTypeExtension extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('widget_add_btn', $options['widget_add_btn']);
        $builder->setAttribute('widget_remove_btn', $options['widget_remove_btn']);
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view->set('widget_add_btn', @$form->getAttribute('allow_add') ? $form->getAttribute('widget_add_btn') : null);

        //todo make array, and add
        // add check function
        // add failed function
        //
        $view->set('widget_remove_btn', $form->getAttribute('widget_remove_btn'));
        //todo make array, and add
        // remove check function
        // remove failed function
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'widget_add_btn' => "add",
            'widget_remove_btn' => null,
        );
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
