<?php
namespace Aldarien\Format;

use Psr\Container\ContainerInterface as Container;
use Carbon\Carbon;
use Aldarien\Common\Alias\Format as FormatInterface;
use Aldarien\Common\Define\Format;

class Date extends Format {
  protected $timezone;
  protected $format;
  protected $local;
  protected $locale;
  public function __construct(string $name, Container $container = null) {
    parent::__construct($name, $container);
    $this->format = "d \d\\e F Y";
    $this->local = false;
    if ($container !== null and $container->has('formats')) {
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->timezone)) {
        $this->setTimezone($container->get('formats')->date->timezone);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->format)) {
        $this->setFormat($container->get('formats')->{$this->name}->format);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->local)) {
        $this->setLocal($container->get('formats')->{$this->name}->local);
      }
      if (isset($container->get('formats')->{$this->name}) and isset($container->get('formats')->{$this->name}->locale)) {
        $this->setLocale($container->get('formats')->{$this->name}->locale);
      }
    }
  }
  public function setTimezone(string $timezone): FormatInterface {
    $this->timezone = $timezone;
    return $this;
  }
  public function setFormat(string $format): FormatInterface {
    $this->format = $format;
    return $this;
  }
  public function setLocal(bool $local): FormatInterface {
    $this->local = $local;
    return $this;
  }
  public function setLocale(string $locale): FormatInterface {
    $this->locale = $locale;
    return $this;
  }
  public function format($input): string {
    if (!is_a($input, \DateTime::class)) {
      $input = Carbon::parse($input, $this->timezone);
    }
    if ($this->local) {
      return $input->locale($this->locale)->isoFormat($this->format);
    }
    return $input->format($this->format);
  }
}
