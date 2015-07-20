<?php

use App\categorie;
use App\image;
use App\product;
use App\Content;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CategorieTableSeeder');
		$this->call('ProductTableSeeder');
		$this->call('ImageTableSeeder');
		$this->call('ContentTableSeeder');
	}

}

class ProductTableSeeder extends Seeder{

	public function run(){
		DB::table('products')->truncate();

		$faker = Factory::create();

		$categories = categorie::all()->lists('id');
		foreach(range(1,50) as $index) {
			product::create([
				'name' => $faker->sentence(4),
				'categorie_id' => $faker->randomElement($categories),
				'description' => $faker->text,
				'price' => $faker->randomFloat(2, 2, 200),
				'amount' => $faker->randomNumber(2),
				'slug' => $faker->slug
			]);
		}
	}

}
class CategorieTableSeeder extends Seeder{
	public function run(){
		DB::table('categories')->truncate();
		$faker = Factory::create();

		foreach(range(1,10) as $index) {
			categorie::create([
				'name' => $faker->sentence(4),
				'slug' => $faker->slug,
				'description' => $faker->text
			]);
		}
	}

}

class ImageTableSeeder extends Seeder{
	public function run(){
		DB::table('images')->truncate();

		$products = product::all()->lists('id');

		$faker = Factory::create();

		foreach($products AS $product){
			image::create([
				'image' => $faker->randomElement([
					"hoody_01_white.jpg",
					"hoody_01_green.jpg"
				]),
				'imageable_id' => $product,
				'imageable_type' => 'App\product'
			]);
		}
	}

}

class ContentTableSeeder extends Seeder{
	public function run(){

		DB::table('contents')->truncate();

		$faker = Factory::create();

		foreach(range(1,50) as $index) {
			$tmpName = $faker->name;
			Content::create([
				'name' => $tmpName,
				'url' => 'content/page/'.$tmpName,
				'content' => $faker->text
			]);
		}
	}
}