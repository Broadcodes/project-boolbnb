<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['WiFi', 'Posto Macchina', 'Piscina', 'Portineria', 'Sauna', 'Vista Mare'];

        foreach ($services as $model) {

            $service = new Service();
            $service->name = $model;
            $service->slug = Str::slug($service->name);
            $service->save();
        }
    }
}
