<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
        <tr>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td><a href="{{ route('department.employees', $department->id) }}">{{ $department->title }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
