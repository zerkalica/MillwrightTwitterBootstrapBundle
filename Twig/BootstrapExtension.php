<?php
namespace Millwright\TwitterBootstrapBundle\Twig;

/**
 * Twig extension for Bootstrap helpers
 */
class BootstrapExtension extends \Twig_Extension
{
    protected $enviroment;
    protected $template;

    public function __construct(\Twig_Environment $environment, $template)
    {
        $this->enviroment = $environment;
        $this->template   = $template;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            'email_link' => new \Twig_Filter_Method($this, 'emailLink', array('is_safe' => array('html'))),
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
}
