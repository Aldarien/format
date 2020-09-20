<?php
namespace Aldarien\Common\Alias;

use Psr\Container\ContainerInterface as Container;

interface Format {
  public function __construct(string $name, Container $container = null);
  public function format($input): string;
}
