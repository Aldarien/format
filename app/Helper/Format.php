<?php
namespace App\Helper;

class Format
{
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
	public static function date(string $date)
	{
		$d = \Carbon\Carbon::parse($date, config('app.timezone'));
		return $d->format("d \d\\e F Y");
	}
	public static function shortDate(string $date)
	{
		$d = \Carbon\Carbon::parse($date, config('app.timezone'));
		return $d->format('d-m-Y');
	}
	public static function localDate(string $date)
	{
		$d = \Carbon\Carbon::parse($date, config('app.timezone'));
		setlocale(LC_TIME, 'es');
		return $d->formatLocalized('%d de %B de %Y');
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