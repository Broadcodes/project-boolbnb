<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            $apartment = new Apartment();
            $apartment->user_id = 1;
            $apartment->apartment_title = $faker->realText($maxNbChars = 50, $indexSize = 2);

            // slug
            $slug = Str::slug($apartment->apartment_title);
            $slug_base = $slug;
            $existingslug = Apartment::where('apartment_slug', $slug)->first();
            $counter = 1;
            while ($existingslug) {
                $slug = $slug_base . '_' . $counter;
                $existingslug = Apartment::where('apartment_slug', $slug)->first();
                $counter++;
            }
            $apartment->apartment_slug = $slug;
            // end slug

            $apartment->description = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $apartment->bedrooms = $faker->numberBetween(2,10);
            $apartment->bed = $faker->numberBetween(2,10);
            $apartment->bathrooms = $faker->numberBetween(1,5);
            $apartment->sqm = 123.45;
            $apartment->category = $faker->word();
            $apartment->price = 123456.78;
            $apartment->visible = false;
            $apartment->apartment_images = $faker->imageUrl(640, 480, 'animals', true);
            $apartment->address = $faker->address();
            $apartment->civic_number = $faker->numberBetween(1,100);
            $apartment->countrySubdivision = $faker->city();
            $apartment->postalCode = $faker->randomNumber(5, true);
            $apartment->latitude = 12.3456789123;
            $apartment->longitude = 12.3456789123;
            $apartment->city = $faker->city();

            $apartment->save();
        }


    }
}
