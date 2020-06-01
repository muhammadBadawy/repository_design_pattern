<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Branch;
use Illuminate\Http\Request;
use App\Repositories\BranchRepository;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
  protected $model;

  public function __construct(Employee $employee)
  {
      // set the model
      $this->model = new EmployeeRepository($employee);
  }

  public function index()
  {
      $employees = $this->model->all();
      return view('admin.employees.index', compact('employees'));
  }

  public function create()
  {
      $branches = (new BranchRepository(new Branch))->allForList();
      return view('admin.employees.create', compact('branches'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|max:500',
          'phone' => 'required|min:0|numeric',
          'email' => 'email',
          'branch_id' => 'required|numeric|min:0'
      ]);

      // create record and pass in only fields that are fillable
      $employee = $this->model->create($request->only($this->model->getModel()->fillable));
      return view('admin.employees.show', compact('employee'));
  }

  public function show($id)
  {
      $employee =  $this->model->show($id);
      return view('admin.employees.show', compact('employee'));
  }

  public function edit($id)
  {
      $employee =  $this->model->show($id);
      $branches = (new BranchRepository(new Branch))->allForList();
      return view('admin.employees.edit', compact('employee', 'branches'));
  }

  public function update(Request $request, $id)
  {
      // update model and only pass in the fillable fields
      $this->model->update($request->only($this->model->getModel()->fillable), $id);

      $employee = $this->model->show($id);
      return view('admin.employees.show', compact('employee'));
  }

  public function destroy($id)
  {
      $this->model->delete($id);
      $employees = $this->model->all();
      return view('admin.employees.index', compact('employees'));
  }
}
