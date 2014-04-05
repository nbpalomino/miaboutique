<?php

use Faker\Factory;

class DatabaseSeeder extends Seeder 
{

	protected $faker;

	public function getFaker()
	{
		if (empty($this->faker)) {
			$this->faker = Faker\Factory::create();
			$this->faker->addProvider(new Faker\Provider\Base($this->faker));
			$this->faker->addProvider(new Faker\Provider\Lorem($this->faker));
		}

		return $this->faker;
	}
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Eloquent::unguard();

		// $this->call('AccountTableSeeder');
		// $this->call('CategoryTableSeeder');
		// $this->call('ProductTableSeeder');
		$this->call('OrderTableSeeder');
		$this->call('OrderItemTableSeeder');
	}

}