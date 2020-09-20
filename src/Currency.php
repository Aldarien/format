<?php
namespace Aldarien\Format;

use Psr\Container\ContainerInterface as Container;
use Aldarien\Common\Alias\Format as FormatInterface;
use Aldarien\Common\Define\Format;

class Currency extends Number {
  protected $prefix;
  protected $suffix;
  public function __construct(string $name, Container $container = null) {
    parent::__construct($name, $container);
    if ($container !== null and $container->has('formats')) {
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->prefix)) {
        $this->setPrefix($container->get('formats')->{$this->name}->prefix);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->suffix)) {
        $this->setSuffix($container->get('formats')->{$this->name}->suffix);
      }
    }
  }
  public function setPrefix(string $char): FormatInterface {
    $this->prefix = $char;
    return $this;
  }
  public function setSuffix(string $char): FormatInterface {
    $this->suffix = $char;
    return $this;
  }
  public function format($input): string {
    return implode('', [
      $this->prefix ?: '',
      parent::format($input),
      $this->suffix ?: ''
    ]);
  }
}
