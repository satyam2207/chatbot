<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Notice;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    public function run(): void
    {
        $computer = Department::create([
            'name' => 'Computer Engineering',
            'code' => 'CE',
            'description' => 'Department of Computer Engineering.',
            'is_active' => true,
        ]);

        $mechanical = Department::create([
            'name' => 'Mechanical Engineering',
            'code' => 'ME',
            'description' => 'Department of Mechanical Engineering.',
            'is_active' => true,
        ]);

        $civil = Department::create([
            'name' => 'Civil Engineering',
            'code' => 'CV',
            'description' => 'Department of Civil Engineering.',
            'is_active' => true,
        ]);

        Faculty::create([
            'name' => 'Computer Engineering Faculty',
            'email' => 'computer@kdppolytechnic.ac.in',
            'designation' => 'Head of Department',
            'department_id' => $computer->id,
            'is_active' => true,
        ]);

        Faculty::create([
            'name' => 'Mechanical Engineering Faculty',
            'email' => 'mechanical@kdppolytechnic.ac.in',
            'designation' => 'Head of Department',
            'department_id' => $mechanical->id,
            'is_active' => true,
        ]);

        Faculty::create([
            'name' => 'Civil Engineering Faculty',
            'email' => 'civil@kdppolytechnic.ac.in',
            'designation' => 'Head of Department',
            'department_id' => $civil->id,
            'is_active' => true,
        ]);

        Notice::create([
            'title' => 'Mid Semester Examination',
            'description' => 'Mid semester examination schedule and instructions.',
            'category' => 'Academic',
            'notice_date' => now()->toDateString(),
            'is_active' => true,
        ]);

        Notice::create([
            'title' => 'Scholarship Applications',
            'description' => 'Students can submit their scholarship applications.',
            'category' => 'Scholarship',
            'notice_date' => now()->toDateString(),
            'is_active' => true,
        ]);

        Notice::create([
            'title' => 'Technical Workshop',
            'description' => 'Technical workshop registration is now open.',
            'category' => 'Event',
            'notice_date' => now()->toDateString(),
            'is_active' => true,
        ]);
    }
}