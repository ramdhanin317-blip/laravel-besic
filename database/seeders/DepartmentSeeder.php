<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Sistem Informasi']);
        Department::create(['name' => 'Teknik Informatika']);
        Department::create(['name' => 'Teknologi Informasi']);
        Department::create(['name' => 'Pendidikan Teknologi Informasi']);
        Department::create(['name' => 'Bisnis Digital']);
        Department::create(['name' => 'Magister Komputer']);
    }
}
