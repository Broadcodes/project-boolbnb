<?php

use Illuminate\Database\Seeder;

use App\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors =
        [
            [
                "type" => "Base",
                "price" => 2.99,
                "duration" => 24
            ],
            [
                "type" => "Avanzato",
                "price" => 5.99,
                "duration" => 72
            ],
            [
                "type" => "Professionale",
                "price" => 9.99,
                "duration" => 144
            ]
        ];

        foreach ($sponsors as $model) {

            $sponsor = new Sponsor();
            $sponsor->price = $model['price'];
            $sponsor->duration = $model['duration'];
            $sponsor->type = $model['type'];
            $sponsor->save();
        }
    }
}

