<?php

use Illuminate\Database\Seeder;
use App\Repositories\MaintenanceTypesRepositoryInterface;

class MaintenanceTypeTableSeeder extends Seeder
{
    public function __construct(MaintenanceTypesRepositoryInterface $maintenance_type)
    {
        $this->maintenance_type = $maintenance_type;
    }

    public function run()
    {
        $maintenance_types = [
            'Engine Oil Change',
            'Transmission Oil Change',
            'Differential Fluid Change',
            'Brake Fluid Change',
            'Tire Alignment',
            'Tire Rotation',
            'State Inspection + Emissions',
            'Brake Pad Change',
            'New Windshield Wipers',
            'Tire Change'
        ];

        foreach ($maintenance_types as $maintenance_type) {
            $this->maintenance_type->firstOrCreate([
                'type' => $maintenance_type
            ]);
        }
    }
}
