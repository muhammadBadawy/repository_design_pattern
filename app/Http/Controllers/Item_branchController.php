<?php

namespace App\Http\Controllers;

use App\Item;
use App\Employee;
use App\Branch;
use App\Item_branch;
use Illuminate\Http\Request;
use App\Repositories\ItemRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\BranchRepository;
use App\Repositories\Item_branchRepository;

class Item_branchController extends Controller
{
  protected $model;

  public function __construct(Item_branch $item_branch)
  {
      // set the model
      $this->model = new Item_branchRepository($item_branch);
  }

  public function index()
  {
      $item_branches = $this->model->all();
      return view('admin.item_branches.index', compact('item_branches'));
  }

  public function create()
  {
      $branches = (new BranchRepository(new Branch))->allForList();
      $items = (new ItemRepository(new Item))->allForList();
      return view('admin.item_branches.create', compact('branches', 'items'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
          'initial_quantity' => 'required|min:0|numeric',
          'current_quantity' => 'required|min:0|numeric',
          'branch_id' => 'required|numeric|min:0',
          'item_id' => 'required|numeric|min:0'
      ]);

      // create record and pass in only fields that are fillable
      $item_branch = $this->model->create($request->only($this->model->getModel()->fillable));
      return view('admin.item_branches.show', compact('item_branch'));
  }

  public function show($id)
  {
      $item_branch =  $this->model->show($id);
      return view('admin.item_branches.show', compact('item_branch'));
  }

  public function edit($id)
  {
      $item_branch =  $this->model->show($id);
      $branches = (new BranchRepository(new Branch))->allForList();
      $items = (new ItemRepository(new Item))->allForList();
      return view('admin.item_branches.edit', compact('item_branch', 'branches', 'items'));
  }

  public function update(Request $request, $id)
  {
      // update model and only pass in the fillable fields
      $this->model->update($request->only($this->model->getModel()->fillable), $id);

      $item_branch = $this->model->show($id);
      return view('admin.item_branches.show', compact('item_branch'));
  }

  public function destroy($id)
  {
      $this->model->delete($id);
      $item_branches = $this->model->all();
      return view('admin.item_branches.index', compact('item_branches'));
  }
}
