<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Employee
 * @package App\Models
 * @version May 29, 2023, 9:56 am UTC
 *
 * @property \App\Models\Department $department
 * @property string $full_name
 * @property string $date_of_birth
 * @property integer $department_id
 * @property string $position
 * @property string $employee_type
 * @property number $monthly_salary
 */
class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'employees';

    public $fillable = [
        'full_name',
        'date_of_birth',
        'department_id',
        'position',
        'employee_type',
        'monthly_salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'date_of_birth' => 'date',
        'department_id' => 'integer',
        'position' => 'string',
        'employee_type' => 'string',
        'monthly_salary' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required|string|max:255',
        'date_of_birth' => 'required',
        'department_id' => 'required|integer',
        'position' => 'nullable|string|max:255',
        'employee_type' => 'nullable|string',
        'monthly_salary' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'department_id');
    }
}
