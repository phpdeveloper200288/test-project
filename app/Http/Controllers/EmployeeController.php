<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\EmployeeImportRequest;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends AppBaseController
{
    /** @var EmployeeRepository $employeeRepository*/
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, $department = null)
    {
        $perPageOptions = config('constant.per_page_options');
        $perPage = $request->input('per_page', $perPageOptions[0]); // Get selected per page value or use the default option
        $employees = $this->employeeRepository->getWithDepartment($perPage, $department);
        return view('employees.index', compact('employees', 'perPageOptions'));
    }

    //public function import(EmployeeImportRequest $request)
    public function import(Request $request)
    {

        $file = $request->file('file');
        $path = $file->getPathname();

        // Import the XML data using EmployeeImport
        Excel::import(new EmployeeImport, $path, null, \Maatwebsite\Excel\Excel::XML);


        return response()->redirect()->back();
    }
}
