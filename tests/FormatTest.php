<?php
use PHPUnit\Framework\TestCase;
use DI\Container;
use Aldarien\Common\Helper\Format;

class FormatTest extends TestCase {
	protected $number = 5049872.31567;
	protected $date = '2016-03-25';

	protected function getContainer(): Psr\Container\ContainerInterface {
		$container = new Container();
		$container->set('formats', (object) [
			'number' => (object) [
				'decimals' => 2,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				]
			],
			'currency' => (object) [
				'decimals' => 0,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				],
				'prefix' => '$ '
			],
			'pesos' => (object) [
				'decimals' => 0,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				],
				'prefix' => '$ '
			],
			'ufs' => (object) [
				'decimals' => 2,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				],
				'suffix' => ' UF'
			],
			'm2' => (object) [
				'decimals' => 2,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				],
				'suffix' => ' m&#0178;'
			],
			'date' => (object) [
				'timezone' => 'America/Santiago'
			],
			'shortDate' => (object) [
				'timezone' => 'America/Santiago',
				'format' => 'd-m-Y'
			],
			'localDate' => (object) [
				'timezone' => 'America/Santiago',
				'format' => 'DD [de] MMMM [de] YYYY',
				'local' => true,
				'locale' => 'es_ES'
			],
			'percent' => (object) [
				'decimals' => 2,
				'separators' => (object) [
					'decimals' => ',',
					'thousands' => '.'
				],
				'suffix' => ' %'
			]
		]);
		return $container;
	}

	public function testCreate(): Format {
		$format = new Format();
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterNumber(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Number'
		]);
		$format->register('number', new $class('number', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterNumber
	 */
	public function testNumber(Format $format) {
		$output = '5.049.872,32';
		$result = $format->format('number', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->number($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterCurrency(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Currency'
		]);
		$format->register('currency', new $class('currency', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterCurrency
	 */
	public function testCurrency(Format $format) {
		$output = '$ 5.049.872';
		$result = $format->format('currency', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->currency($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterPesos(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Currency'
		]);
		$format->register('pesos', new $class('pesos', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterPesos
	 */
	public function testPesos(Format $format) {
		$output = '$ 5.049.872';
		$result = $format->format('pesos', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->pesos($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterUfs(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Currency'
		]);
		$format->register('ufs', new $class('ufs', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterUfs
	 */
	public function testUfs(Format $format) {
		$output = '5.049.872,32 UF';
		$result = $format->format('ufs', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->ufs($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterM2(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Currency'
		]);
		$format->register('m2', new $class('m2', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterM2
	 */
	public function testM2(Format $format) {
		$output = '5.049.872,32 m&#0178;';
		$result = $format->format('m2', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->m2($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterPercent(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Currency'
		]);
		$format->register('percent', new $class('percent', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterPercent
	 */
	public function testPercent(Format $format) {
		$output = '5.049.872,32 %';
		$result = $format->format('percent', $this->number);
		$this->assertEquals($output, $result);
		$result = $format->percent($this->number);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterDate(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Date'
		]);
		$format->register('date', new $class('date', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterDate
	 */
	public function testDate(Format $format) {
		$output = '25 de March 2016';
		$result = $format->format('date', $this->date);
		$this->assertEquals($output, $result);
		$result = $format->date($this->date);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterShortDate(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Date'
		]);
		$format->register('shortDate', new $class('shortDate', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterShortDate
	 */
	public function testShortDate(Format $format) {
		$output = '25-03-2016';
		$result = $format->format('shortDate', $this->date);
		$this->assertEquals($output, $result);
		$result = $format->shortDate($this->date);
		$this->assertEquals($output, $result);
	}
	/**
	 * @depends testCreate
	 */
	public function testRegisterLocalDate(Format $format): Format {
		$class = implode("\\", [
			'Aldarien',
			'Format',
			'Date'
		]);
		$format->register('localDate', new $class('localDate', $this->getContainer()));
		$this->assertTrue(true);
		return $format;
	}
	/**
	 * @depends testRegisterLocalDate
	 */
	public function testLocalDate(Format $format) {
		$output = '25 de marzo de 2016';
		$result = $format->format('localDate', $this->date);
		$this->assertEquals($output, $result);
		$result = $format->localDate($this->date);
		$this->assertEquals($output, $result);
	}
}
