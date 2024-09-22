<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryStatus::factory()->create([
            'status_name' => 'planned',
            'queue' => 1,
        ]);

        DeliveryStatus::factory()->create([
            'status_name' => 'shipped',
            'queue' => 2,
        ]);

        DeliveryStatus::factory()->create([
            'status_name' => 'delivered',
            'queue' => 3,
        ]);
    }
}
