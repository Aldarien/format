<?php
use PHPUnit\Framework\TestCase;
use App\Helper\Format;

class FormatTest extends TestCase
{
	public function testFormat()
	{
		$number = 549872.31567;
		$output = '549.872,316';
		
		$this->assertEquals($output, Format::number($number, 3));
	}
}
?>