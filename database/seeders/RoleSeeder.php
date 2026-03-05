<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $items = [
            [
                'id' => 1,
                'name' => 'admin1',
                'email' => 'admin1@example.ph',
                'name' => 'admin1',
                'phone' => '09174564564',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 2,
                'name' => 'admin2',
                'email' => 'admin2@example.ph',
                'name' => 'admin2',
                'phone' => '09174514564',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 3,
                'name' => 'organizer1',
                'email' => 'organizer1@example.ph',
                'name' => 'organizer1',
                'phone' => '09174514564',
                'password' => bcrypt('password'),
                'role' => 'organizer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 4,
                'name' => 'organizer2',
                'email' => 'organizer2@example.ph',
                'name' => 'organizer2',
                'phone' => '09174514864',
                'password' => bcrypt('password'),
                'role' => 'organizer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 5,
                'name' => 'organizer3',
                'email' => 'organizer3@example.ph',
                'name' => 'organizer3',
                'phone' => '09174514864',
                'password' => bcrypt('password'),
                'role' => 'organizer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 6,
                'name' => 'customer1',
                'email' => 'customer1@example.ph',
                'name' => 'customer1',
                'phone' => '09174514874',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 8,
                'name' => 'customer2',
                'email' => 'customer2@example.ph',
                'name' => 'customer2',
                'phone' => '09174514874',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],

            [
                'id' => 9,
                'name' => 'Juan Dela Cruz',
                'email' => 'juan.delacruz@example.ph',
                'phone' => '09171234567',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-01-10 08:30:00',
                
                'updated_at' => '2020-01-10 08:30:00',
                'email_verified_at' => '2022-01-10 10:00:00',
            ],
            [
                'id' => 10,
                'name' => 'Maria Santos',
                'email' => 'maria.santos@example.ph',
                'phone' => '09187654321',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-02-15 09:15:22',
                
                'updated_at' => '2020-02-16 11:20:10',
                'email_verified_at' => '2022-02-15 12:00:00',
            ],
            [
                'id' => 11,
                'name' => 'Antonio Luna',
                'email' => 'antonio.luna@example.ph',
                'phone' => '09192223333',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-03-20 14:45:00',
                
                'updated_at' => '2020-03-22 08:10:00',
                'email_verified_at' => '2022-03-20 15:30:00',
            ],
            [
                'id' => 12,
                'name' => 'Elena Reyes',
                'email' => 'elena.reyes@example.ph',
                'phone' => '09204445555',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-04-05 10:00:00',
                
                'updated_at' => '2020-04-05 10:00:00',
                'email_verified_at' => '2022-04-05 11:45:00',
            ],
            [
                'id' => 13,
                'name' => 'Ricardo Dalisay',
                'email' => 'cardotesto@example.ph',
                'phone' => '09215556666',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-05-12 07:20:00',
                
                'updated_at' => '2020-05-15 13:40:00',
                'email_verified_at' => '2022-05-12 08:00:00',
            ],
            [
                'id' => 14,
                'name' => 'Liza Soberano',
                'email' => 'liza.s@example.ph',
                'phone' => '09227778888',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-06-01 16:30:45',
                
                'updated_at' => '2020-06-02 09:12:33',
                'email_verified_at' => '2022-06-01 17:00:00',
            ],
            [
                'id' => 15,
                'name' => 'Jose Rizal',
                'email' => 'pepe.rizal@example.ph',
                'phone' => '09238889999',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-07-04 12:00:00',
                
                'updated_at' => '2020-07-04 12:00:00',
                'email_verified_at' => '2022-07-04 12:30:00',
            ],
            [
                'id' => 7,
                'name' => 'customer3',
                'email' => 'customer3@example.ph',
                'phone' => '09174514874',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 03:56:36',
                
                'updated_at' => '2020-06-06 00:49:17',
                'email_verified_at' => '2022-07-15 04:43:59',
            ],
            
        ];
        
        foreach ($items as $item) {
            User::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
