<?php

namespace Database\Seeders;

use App\Models\EventBooking\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['id' => 1, 'title' => 'Tech Summit 2026', 'date' => '2026-05-15', 'location' => 'Manila', 'created_by' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Holistic Health Workshop', 'date' => '2026-06-20', 'location' => 'Cebu', 'created_by' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'title' => 'Financial Planning Seminar', 'date' => '2026-07-10', 'location' => 'Davao', 'created_by' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'title' => 'Laravel Masters Class', 'date' => '2026-08-05', 'location' => 'Remote', 'created_by' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'title' => 'Startup Weekend', 'date' => '2026-09-12', 'location' => 'Makati', 'created_by' => '1', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($items as $item) {
            Event::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
