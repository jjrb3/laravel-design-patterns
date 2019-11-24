<?php
namespace Tests\Feature\app\Http\Controllers\Creational;

use Tests\TestCase;

/**
 * Class AbstractFactoryTest
 *
 * @package Tests\Feature\app\Http\Controllers\Creational
 */
class AbstractFactoryTest extends TestCase
{
	/**
	 * @var array
	 */
	private $carParameters = [];

	/**
	 * @var array
	 */
	private $scooterParameters = [];

	protected function setUp(): void
	{
		parent::setUp();
		$this->scooterParameters = [
			'model'   => 'Sedan',
			'standar' => 'Red',
			'power'   => '2'
		];
		$this->carParameters = array_merge(
			$this->scooterParameters, ['space' => '4.1']
		);
	}

	public function testElectricCar(): void
	{
		$this->get(
			route('electricCar', $this->carParameters)
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'feature' => 'Model electric car: Sedan, color Red, power 2 and space Red.'
				]
			);
	}

	public function testGasolineCar(): void
	{
		$this->get(
			route('gasolineCar', $this->carParameters)
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'feature' => 'Model gasoline car: Sedan, color Red, power 2 and space Red.'
				]
			);
	}

	public function testElectricScooter(): void
	{
		$this->get(
			route('electricScooter', $this->scooterParameters)
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'feature' => 'Model electric scooter: Sedan, color Red, power 2 and space Red.'
				]
			);
	}

	public function testGasolineScooter(): void
	{
		$this->get(
			route('gasolineScooter', $this->scooterParameters)
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'feature' => 'Model gasoline scooter: Sedan, color Red, power 2 and space Red.'
				]
			);
	}
}
