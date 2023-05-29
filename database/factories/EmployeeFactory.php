<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        $departmentIds = Department::pluck('id')->toArray();

        return [
            'full_name' => $faker->name,
            'date_of_birth' => $faker->date,
            'department_id' => $faker->randomElement($departmentIds),
            'position' => $faker->jobTitle,
            'employee_type' => $faker->randomElement(['rate', 'hourly']),
            'monthly_salary' => $faker->numberBetween(2000, 10000)
        ];
    }
}
