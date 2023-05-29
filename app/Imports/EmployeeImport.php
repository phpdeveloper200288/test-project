<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmployeeImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $employee = new Employee();
            $employee->full_name = $row['full_name'];
            $employee->date_of_birth = $row['date_of_birth'];
            $employee->position = $row['position'];
            $employee->employee_type = $row['employee_type'];
            $employee->monthly_salary = $row['monthly_salary'];
            $employee->department_id = null;
            if (isset($row['department']) && !empty($row['department'])) {
                $department = Department::updateOrCreate(['title' => $row['department']['title']]);
                $employee->department_id = $department->id;
            }
            $employee->save();
        }
    }
}
