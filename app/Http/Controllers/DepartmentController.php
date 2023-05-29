<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends AppBaseController
{
    /** @var departmentRepository $departmentRepository*/
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPageOptions = config('constant.per_page_options');
        $perPage = $request->input('per_page', $perPageOptions[0]); // Get selected per page value or use the default option
        $departments = $this->departmentRepository->getAll($perPage);
        return view('departments.index', compact('departments', 'perPageOptions'));
    }
}
