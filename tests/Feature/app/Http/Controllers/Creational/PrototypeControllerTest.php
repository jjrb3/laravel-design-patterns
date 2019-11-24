<?php
namespace Tests\Feature\app\Http\Controllers\Creational;

use Tests\TestCase;

/**
 * Class PrototypeController
 *
 * @package Tests\Feature\app\Http\Controllers
 */
class PrototypeControllerTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testDiscountClient()
	{
		$this->get(
			route('books')
		)
			->assertStatus(200)
			->assertExactJson(
				[
					'books' => [
						'SQL For Cats'           => [
							'title' => 'SQL For Cats',
							'topic' => 'SQL'
						],
						'OReilly Learning PHP 5' => [
							'title' => 'OReilly Learning PHP 5',
							'topic' => 'PHP'
						],
						'OReilly Learning SQL'   => [
							'title' => 'OReilly Learning SQL',
							'topic' => 'SQL'
						]
					]
				]
			);
	}
}
