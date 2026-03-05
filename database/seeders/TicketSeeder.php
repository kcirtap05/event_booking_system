<?php

namespace Database\Seeders;

use App\Models\EventBooking\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [];
        $types = ['VIP', 'Regular', 'Early Bird'];
        $prices = [5000, 2000, 1000];

        for ($event_id = 1; $event_id <= 5; $event_id++) {
            foreach ($types as $index => $type) {
                $tickets[] = [
                    'event_id' => $event_id,
                    'type' => $type,
                    'price' => $prices[$index],
                    'quantity' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                
            }
        }

        Ticket::insert($tickets);
    }
}
