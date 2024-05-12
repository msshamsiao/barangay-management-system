<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = DB::connection('mongodb')->collection('users');

        $collection->delete();

        $users = [
            [
                'firstname' => 'Admin', 
                'lastname' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'firstname' => 'User', 
                'lastname' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($users as $user) {
            $collection->insert($user);
        }

       $this->command->info('Users seeded successfully.');
    }
}
