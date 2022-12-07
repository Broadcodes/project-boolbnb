<?php

use Illuminate\Database\Seeder;
use Fake\Generator as Faker;
use App\Apartment;
use App\Message;
use App\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) {
            $apartment = Apartment::inRandomOrder()->first();
            $message = new Message;
            $message->apartment_id = $apartment->id;
            $message->content_message = $faker->paragraph;
            $message->email = $faker->email;
            $message->created_at = $faker->format('Y-m-d');
            $message->updated_at =$faker->format('Y-m-d');



            $message->save();
    }
}

}
