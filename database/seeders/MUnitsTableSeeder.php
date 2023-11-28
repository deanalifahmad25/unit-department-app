<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Unit;

class MUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'id' => Str::uuid(),
                'name' => 'Land Sourcing Unit',
                'slug' => 'land-sourcing-unit'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Project Management Unit',
                'slug' => 'project-management-unit'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Real Estate Business Unit',
                'slug' => 'real-estate-business-unit'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Trace Center Business Unit',
                'slug' => 'trace-center-business-unit'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Corporate Service Unit',
                'slug' => 'corporate-service-unit'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'AgriBusiness Unit',
                'slug' => 'agribusiness-unit'
            ],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
