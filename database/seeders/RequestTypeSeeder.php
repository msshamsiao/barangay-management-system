<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = DB::connection('mongodb')->collection('request_type');
        
        $collection->insert([
            'name' => 'Barangay Certificate',
            'description' => 'Barangay Certificate',
        ]);

        $collection->insert([
            'name' => 'Barangay Id',
            'description' => 'Barangay Id',
        ]);

        $collection->insert([
            'name' => 'Barangay Business Location',
            'description' => 'Barangay Business Location',
        ]);

        $collection->insert([
            'name' => 'Permit',
            'description' => 'Permit',
        ]);

        $collection->insert([
            'name' => 'Barangay Clearance',
            'description' => 'Barangay Clearance',
        ]);

        $collection->insert([
            'name' => 'Barangay Facility',
            'description' => 'Barangay Facility',
        ]);
    }
}
