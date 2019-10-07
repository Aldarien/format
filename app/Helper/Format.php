<?php
namespace App\Helper;

use Carbon\Carbon;

class Format
{
	protected $container;
	public function __construct(ContainerInterface $container = null) {
		$this->container = $container;
	}
	public static function number(float $number, $decimals)
	{
		return number_format($number, $decimals, ',', '.');
	}
	public static function pesos(float $number, bool $print = false)
	{
		return (($print) ? '$ ' : '') . self::number($number, 0);
	}
	public static function ufs(float $number, bool $print = false)
	{
		return self::number($number, 2) . (($print) ? ' UF' : '');
	}
	public static function date(string $date, $timezone = null)
	{
		if ($timezone == null) {
			$timezone = config('app.timezone');
		}
		$d = Carbon::parse($date, $timezone);
		return $d->format("d \d\\e F Y");
	}
	public static function shortDate(string $date, $timezone = null)
	{
		if ($timezone == null) {
			$timezone = config('app.timezone');
		}
		$d = Carbon::parse($date, $timezone);
		return $d->format('d-m-Y');
	}
	public static function localDate(string $date, $timezone = null)
	{
		if ($timezone == null) {
			$timezone = config('app.timezone');
		}
		$d = Carbon::parse($date, $timezone);
		$d->locale('es_ES');
		//setlocale(LC_TIME, 'es');
		return $d->isoFormat('DD [de] MMMM [de] YYYY');
	}
	public static function m2(float $number, bool $print = false)
	{
		return self::number($number, 2) . (($print) ? ' m&#0178;' : '');
	}
	public static function percent(float $number, bool $print = false)
	{
		return self::number($number, 2) . (($print) ? '%' : '');
	}
}
?>
