<?php
namespace Aldarien\Common\Define;

use Psr\Container\ContainerInterface as Container;
use Aldarien\Common\Alias\Format as FormatInterface;

abstract class Format implements FormatInterface {
  protected $name;
  public function __construct(string $name, Container $container = null) {
    $this->name = $name;
  }
}
