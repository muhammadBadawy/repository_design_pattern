<?php

namespace App\Http\Controllers;

use App\Item;
use App\Employee;
use App\Branch;
use App\Item_transaction;
use Illuminate\Http\Request;
use App\Repositories\ItemRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\BranchRepository;
use App\Repositories\Item_transactionRepository;

class Item_transactionController extends Controller
{
  protected $model;

  public function __construct(Item_transaction $item_transaction)
  {
      // set the model
      $this->model = new Item_transactionRepository($item_transaction);
  }

  public function index()
  {
      $item_transactions = $this->model->all();
      return view('admin.item_transactions.index', compact('item_transactions'));
  }

  public function create()
  {
      $branches = (new BranchRepository(new Branch))->allForList();
      $employees = (new EmployeeRepository(new Employee))->allForList();
      $items = (new ItemRepository(new Item))->allForList();
      return view('admin.item_transactions.create', compact('branches', 'employees', 'items'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
        'type' => 'required|min:0|numeric',
        'quantity' => 'required|min:0|numeric',
        'employee_id' => 'required|numeric|min:0',
        'branch_id' => 'required|numeric|min:0',
        'item_id' => 'required|numeric|min:0'
      ]);

      // create record and pass in only fields that are fillable
      $item_transaction = $this->model->create($request->only($this->model->getModel()->fillable));

      if($item_transaction == false){
        return redirect()->back()->withErrors(['You don\'t have enough stock']);
      }

      return view('admin.item_transactions.show', compact('item_transaction'));
  }

  public function show($id)
  {
      $item_transaction =  $this->model->show($id);
      return view('admin.item_transactions.show', compact('item_transaction'));
  }

  public function edit($id)
  {
      $item_transaction =  $this->model->show($id);
      $branches = (new BranchRepository(new Branch))->allForList();
      $employees = (new EmployeeRepository(new Employee))->allForList();
      $items = (new ItemRepository(new Item))->allForList();
      return view('admin.item_transactions.edit', compact('item_transaction', 'branches', 'employees', 'items'));
  }

  public function update(Request $request, $id)
  {
      // update model and only pass in the fillable fields
      $this->model->update($request->only($this->model->getModel()->fillable), $id);

      $item_transaction = $this->model->show($id);
      return view('admin.item_transactions.show', compact('item_transaction'));
  }

  public function destroy($id)
  {
      $this->model->delete($id);
      $item_transactions = $this->model->all();
      return view('admin.item_transactions.index', compact('item_transactions'));
  }
}
