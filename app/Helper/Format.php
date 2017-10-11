<?php
namespace App\Helper;

class Format
{
	public static function number(float $number, $decimals)
	{
		return number_format($number, $decimals, ',', '.');
	}
	public static function pesos(float $number)
	{
		return self::number($number, 0);
	}
	public static function ufs(float $number)
	{
		return self::number($number, 2);
	}
	public static function date(string $date)
	{
		$d = \Carbon\Carbon::parse($date, config('app.timezone'));
		return $d->format("d \d\e F Y");
	}
	public static function shortDate(string $date)
	{
		$d = \Carbon\Carbon::parse($date, config('app.timezone'));
		return $d->format('d-m-Y');
	}
}
?>