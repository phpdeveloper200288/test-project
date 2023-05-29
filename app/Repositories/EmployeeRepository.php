<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version May 29, 2023, 10:23 am UTC
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'date_of_birth',
        'department_id',
        'position',
        'employee_type',
        'monthly_salary'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }

    public function getWithDepartment($perPage = 5, $department = null)
    {
        $filter = $department ? ['department_id' => $department] : [];
        return $this->allQuery($filter)->with('department')->paginate($perPage);
    }
}
