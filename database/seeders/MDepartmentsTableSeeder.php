<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Unit;
use App\Models\Department;

class MDepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitAId = DB::table('m_units')->where('slug', 'land-sourcing-unit')->value('id');
        $unitBId = DB::table('m_units')->where('slug', 'project-management-unit')->value('id');
        $unitCId = DB::table('m_units')->where('slug', 'real-estate-business-unit')->value('id');
        $unitDId = DB::table('m_units')->where('slug', 'trace-center-business-unit')->value('id');
        $unitEId = DB::table('m_units')->where('slug', 'corporate-service-unit')->value('id');
        $unitFId = DB::table('m_units')->where('slug', 'agribusiness-unit')->value('id');

        $departments = [
            [
                'id' => Str::uuid(),
                'name' => 'Land Sourcing Dept.',
                'unit_id' => $unitAId,
                'slug' => 'land-sourcing-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Design & Development Dept.',
                'unit_id' => $unitBId,
                'slug' => 'design-and-development-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Project Operation Dept.',
                'unit_id' => $unitBId,
                'slug' => 'project-operation-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Marketing Dept.',
                'unit_id' => $unitCId,
                'slug' => 'marketing-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Marcomm Dept.',
                'unit_id' => $unitCId,
                'slug' => 'marcomm-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Care Dept.',
                'unit_id' => $unitCId,
                'slug' => 'care-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'TCBU Operational Dept.',
                'unit_id' => $unitDId,
                'slug' => 'tcbu-operational-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'HR Dept.',
                'unit_id' => $unitEId,
                'slug' => 'hr-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'F&A Dept.',
                'unit_id' => $unitEId,
                'slug' => 'f-and-a-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'ProGIT Dept.',
                'unit_id' => $unitEId,
                'slug' => 'progit-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Legal Dept.',
                'unit_id' => $unitEId,
                'slug' => 'legal-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Mill Dept.',
                'unit_id' => $unitFId,
                'slug' => 'mill-dept'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Komersil Dept.',
                'unit_id' => $unitFId,
                'slug' => 'komersil-dept'
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
