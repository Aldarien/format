<?php
namespace Aldarien\Common\Helper;

use Aldarien\Common\Alias\Format as FormatInterface;

class Format {
	protected $formats;
	public function register(string $name, FormatInterface $format): Format {
		$this->formats[$name] = $format;
		return $this;
	}
	public function format(string $name, $input): string {
		return $this->formats[$name]->format($input);
	}
	public function isRegistered(string $name): bool {
		return isset($this->formats[$name]);
	}
	public function __call($name, $params) {
		if (\method_exists($this, $name)) {
			return \call_user_func_array([$this, $name], $params);
		}
		if ($this->isRegistered($name)) {
			return $this->format($name, $params[0]);
		}
		throw new \InvalidArgumentException($name . ' is not a callable method for ' . \get_called_class());
	}
}
