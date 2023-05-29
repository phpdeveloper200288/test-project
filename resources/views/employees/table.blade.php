<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Date Of Birth</th>
            <th>Department</th>
            <th>Position</th>
            <th>Employee Type</th>
            <th>Monthly Salary</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->date_of_birth->format('M, d Y') }}</td>
                <td>{{ $employee->department->title }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->employee_type }}</td>
                <td>{{ $employee->monthly_salary }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
