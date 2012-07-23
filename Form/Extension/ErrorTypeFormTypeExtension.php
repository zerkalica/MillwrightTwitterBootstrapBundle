<?php
namespace Millwright\TwitterBootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ErrorTypeFormTypeExtension extends AbstractTypeExtension
{
    protected $error_type;

    public function __construct(array $options)
    {
        $this->error_type = $options['error_type'];
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $vars = array(
            'error_type'  => $options['error_type'],
            'error_delay' => $options['error_delay'],
        );

        array_replace($view->vars, $vars);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'error_type' => $this->error_type,
            'error_delay'=> false
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
