<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Students([
            'name' => $row[0],
            'status_vision_mission' => $row[1],
            'syllabus' => $row[2],
            'classroom_policies' => $row[3],
            'grading_system' => $row[4],
            'requirements_project' => $row[5],
        ]);
    }
}
