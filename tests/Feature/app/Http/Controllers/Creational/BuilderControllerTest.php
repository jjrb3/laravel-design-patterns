<?php
namespace Tests\Feature\app\Http\Controllers\Creational;

use Tests\TestCase;

/**
 * Class BuilderController
 *
 * @package Tests\Feature\app\Http\Controllers
 */
class BuilderControllerTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testCreatePdf()
	{
		$this->get(
			route(
				'documentationVehicle', [
				'type'  => 1,
				'name'  => 'Jeremy',
				'email' => 'jjrb6@hotmail.com'
			]
			)
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'documentation' => "Name: Jeremy\n\nEste documento es de ejemplo en formato pdf\n\nEmail: jjrb6@hotmail.com"
				]
			);
	}
}
