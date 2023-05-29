<li class="nav-item">
    <a href="{{ route('departments.index') }}"
       class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <p>Departments</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('employees.index') }}"
       class="nav-link {{ Request::is('employees*') ? 'active' : '' }}">
        <p>Employees</p>
    </a>
</li>

