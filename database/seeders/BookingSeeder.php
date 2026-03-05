<?php

namespace Database\Seeders;

use App\Models\EventBooking\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['id' => 1, 'user_id' => 1, 'ticket_id' => 1, 'quantity' => 2, 'status' => 'confirmed'],
            ['id' => 2, 'user_id' => 2, 'ticket_id' => 1, 'quantity' => 1, 'status' => 'pending'],
            ['id' => 3, 'user_id' => 3, 'ticket_id' => 2, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 4, 'user_id' => 4, 'ticket_id' => 4, 'quantity' => 3, 'status' => 'cancelled'],
            ['id' => 5, 'user_id' => 5, 'ticket_id' => 5, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 6, 'user_id' => 6, 'ticket_id' => 7, 'quantity' => 2, 'status' => 'confirmed'],
            ['id' => 7, 'user_id' => 7, 'ticket_id' => 10, 'quantity' => 1, 'status' => 'pending'],
            ['id' => 8, 'user_id' => 8, 'ticket_id' => 15, 'quantity' => 4, 'status' => 'confirmed'],
            ['id' => 9, 'user_id' => 1, 'ticket_id' => 3, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 10, 'user_id' => 2, 'ticket_id' => 6, 'quantity' => 2, 'status' => 'confirmed'],
            ['id' => 11, 'user_id' => 3, 'ticket_id' => 9, 'quantity' => 1, 'status' => 'pending'],
            ['id' => 12, 'user_id' => 4, 'ticket_id' => 12, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 13, 'user_id' => 5, 'ticket_id' => 14, 'quantity' => 2, 'status' => 'confirmed'],
            ['id' => 14, 'user_id' => 6, 'ticket_id' => 2, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 15, 'user_id' => 7, 'ticket_id' => 5, 'quantity' => 3, 'status' => 'cancelled'],
            ['id' => 16, 'user_id' => 8, 'ticket_id' => 8, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 17, 'user_id' => 1, 'ticket_id' => 11, 'quantity' => 2, 'status' => 'pending'],
            ['id' => 18, 'user_id' => 2, 'ticket_id' => 13, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 19, 'user_id' => 3, 'ticket_id' => 4, 'quantity' => 1, 'status' => 'confirmed'],
            ['id' => 20, 'user_id' => 4, 'ticket_id' => 7, 'quantity' => 2, 'status' => 'confirmed'],
        ];

        foreach ($items as $item) {
            Booking::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
