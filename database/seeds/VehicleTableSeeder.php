<?php

use Illuminate\Database\Seeder;
use App\Repositories\VehiclesRepositoryInterface;

class VehicleTableSeeder extends Seeder
{
    public function __construct(VehiclesRepositoryInterface $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function run()
    {
        $vehicles = [
            '2013 Subaru Impreza WRX hatchback WRB',
            '2011 Nissan 370z NISMO',
            '2008 Nissan Sentra SE-R Spec-V',
            '2009 Honda Civic Si Coupe',
            '2008 Maserati GranTurismo',
            '2012 Audi S5 Quattro'
        ];

        foreach ($vehicles as $vehicle) {
            $this->vehicle->firstOrCreate([
                'vehicle' => $vehicle
            ]);
        }
    }
}
