<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Repositories\BranchRepository;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    // space that we can use the repository from
   protected $model;

   public function __construct(Branch $branch)
   {
       // set the model
       $this->model = new BranchRepository($branch);
   }

   public function index()
   {
       $branches = $this->model->all();
       return view('admin.branches.index', compact('branches'));
   }

   public function create()
   {
       return view('admin.branches.create');
   }

   public function store(Request $request)
   {
       $this->validate($request, [
           'title' => 'required|max:500',
           'address' => 'required|max:500'
       ]);

       // create record and pass in only fields that are fillable
       $branch = $this->model->create($request->only($this->model->getModel()->fillable));
       return view('admin.branches.show', compact('branch'));
   }

   public function show($id)
   {
       $branch =  $this->model->show($id);
       return view('admin.branches.show', compact('branch'));
   }

   public function edit($id)
   {
       $branch =  $this->model->show($id);
       return view('admin.branches.edit', compact('branch'));
   }

   public function update(Request $request, $id)
   {
       // update model and only pass in the fillable fields
       $this->model->update($request->only($this->model->getModel()->fillable), $id);

       $branch = $this->model->show($id);
       return view('admin.branches.show', compact('branch'));
   }

   public function destroy($id)
   {
       $this->model->delete($id);
       $branches = $this->model->all();
       return view('admin.branches.index', compact('branches'));
   }
}
