<?php
/**
 * @author Raphael Castro <rafaphcastro@gmail.com>
 * @copyright 2016 Raphael Castro
 * @package Raph\Twig\Extension
 * 
 */
namespace Raph\Twig\Extension;

class TranslationExtension extends \Twig_Extension
{
  private $translator = NULL;

  public function __construct($translator) {
    $this->translator = $translator;
  }

  public function getName()
  {
    return 'translate';
  }

  public function getFunctions()
  {
    return [
      new \Twig_SimpleFunction('translate', [$this, 'translate']),
      new \Twig_SimpleFunction('_', [$this, 'translate'])
    ];
  }

  public function translate($name)
  { 
    $translator = $this->translator;
    if(!$translator) {
      throw new \Exception('No translator class found.');
    }
    if(!method_exists($translator, 'trans')) {
      throw new \Exception('No translate method found in translator class.');
    }    
    return $translator->trans($name);
  }
}
