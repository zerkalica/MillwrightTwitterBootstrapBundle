<?php
namespace Millwright\TwitterBootstrapBundle\Twig;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Twig extension for Bootstrap helpers
 */
class BootstrapExtension extends \Twig_Extension
{
    protected $enviroment;
    protected $template;
    protected $translator;

    /**
     * @param \Twig_Environment    $environment
     * @param                     $template
     * @param TranslatorInterface $translator
     */
    public function __construct(\Twig_Environment $environment, $template, TranslatorInterface $translator)
    {
        $this->enviroment = $environment;
        $this->template   = $template;
        $this->translator = $translator;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            'phone'      => new \Twig_Filter_Method($this, 'phone', array('is_safe' => array('html'))),
            'email_link' => new \Twig_Filter_Method($this, 'emailLink', array('is_safe' => array('html'))),
            'boolean'    => new \Twig_Filter_Method($this, 'boolean', array('is_safe' => array('html'))),
            'get_class'  => new \Twig_Filter_Method($this, 'getClass', array('is_safe' => array('html'))),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'millwright_bootstrap';
    }

    /**
     * Render email link
     *
     * @param string $email
     *
     * @return string
     */
    public function emailLink($email)
    {
        $template = $this->enviroment->loadTemplate($this->template);

        return $template->renderBlock('email_link', array('email_uri' => $email));
    }

    public function boolean($variable, $type = 'yes_no')
    {
        return $this->translator->trans($variable ? 'yes' : 'no', array(), 'MillwrightTwitterBootstrapBundle');
    }

    public function phone($phone)
    {
        return $phone;
    }

    public function getClass($object)
    {
        return is_object($object) ? get_class($object) : gettype($object);
    }
}
