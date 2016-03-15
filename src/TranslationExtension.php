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
  private $translator = null;

  public function __construct($translator)
  {
    $this->translator = $translator;
  }

  public function getName()
  {
    return 'translate';
  }

  public function getFunctions()
  {
    return [
      new \Twig_SimpleFunction('trans', [$this, 'trans']),
      new \Twig_SimpleFunction('trans_choice', [$this, 'transChoice'])
    ];
  }

  public function trans($id, array $parameters = [], $domain = 'messages', $locale = null)
  {
    return $this->translator->trans($id, $parameters, $domain, $locale);
  }

  public function transChoice($id, $number, array $parameters = [], $domain = 'messages', $locale = null)
  {
    return $this->translator->transChoice($id, $number, $parameters, $domain, $locale);
  }
  
}
