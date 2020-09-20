<?php
namespace Aldarien\Format;

use Psr\Container\ContainerInterface as Container;
use Aldarien\Common\Alias\Format as FormatInterface;
use Aldarien\Common\Define\Format;

class Number extends Format {
  protected $decimals;
  protected $separators;

  public function __construct(string $name, Container $container = null) {
    parent::__construct($name, $container);
    $this->decimals = 3;
    $this->separators = (object) [
      'thousands' => ',',
      'decimals' => '.'
    ];
    if ($container !== null and $container->has('formats')) {
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->decimals)) {
        $this->setDecimals($container->get('formats')->{$this->name}->decimals);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->separators) and isset($container->get('formats')->{$this->name}->separators->thousands)) {
        $this->setThousandsSeparator($container->get('formats')->{$this->name}->separators->thousands);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->separators) and isset($container->get('formats')->{$this->name}->separators->decimals)) {
        $this->setDecimalsSeparator($container->get('formats')->{$this->name}->separators->decimals);
      }
    }
  }
  public function setDecimals(int $decimals): FormatInterface {
    $this->decimals = $decimals;
    return $this;
  }
  public function setThousandsSeparator(string $char): FormatInterface {
    $this->separators->thousands = $char;
    return $this;
  }
  public function setDecimalsSeparator(string $char): FormatInterface {
    $this->separators->decimals = $char;
    return $this;
  }
  public function format($input): string {
    return number_format($input, $this->decimals, $this->separators->decimals, $this->separators->thousands);
  }
}
