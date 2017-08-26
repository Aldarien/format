<?php
namespace App\Helper;

class Format
{
	public static function number($number, $decimals)
	{
		return number_format($number, $decimals, ',', '.');
	}
	public static function pesos($number)
	{
		return self::number($number, 0);
	}
	public static function ufs($number)
	{
		return self::number($number, 2);
	}
}
?>