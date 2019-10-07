<?php
use PHPUnit\Framework\TestCase;
use App\Helper\Format;

class FormatTest extends TestCase
{
	protected $number = 5049872.31567;
	protected $date = '2016-03-25';

	public function testFormat()
	{
		$output = '5.049.872,316';
		$result = Format::number($this->number, 3);
		$this->assertEquals($output, $result);
	}
	public function testPesosPrint()
	{
		$output = '$ 5.049.872';
		$result = Format::pesos($this->number, true);
		$this->assertEquals($output, $result);
	}
	public function testUFPrint()
	{
		$output = '5.049.872,32 UF';
		$result = Format::ufs($this->number, true);
		$this->assertEquals($output, $result);
	}
	public function testDate()
	{
		$output = '25 de March 2016';
		$result = Format::date($this->date, 'America/Santiago');
		$this->assertEquals($output, $result);
	}
	public function testShortDate()
	{
		$output = '25-03-2016';
		$result = Format::shortDate($this->date, 'America/Santiago');
		$this->assertEquals($output, $result);
	}
	public function testLocalDate()
	{
		$output = '25 de marzo de 2016';
		$result = Format::localDate($this->date, 'America/Santiago');
		$this->assertEquals($output, $result);
	}
	public function testM2Print()
	{
		$output = '5.049.872,32 m&#0178;';
		$result = Format::m2($this->number, true);
		$this->assertEquals($output, $result);
	}
	public function testPercentPrint()
	{
		$output = '5.049.872,32%';
		$result = Format::percent($this->number, true);
		$this->assertEquals($output, $result);
	}
}
?>
