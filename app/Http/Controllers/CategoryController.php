<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
  protected $model;

  public function __construct(Category $category)
  {
      // set the model
      $this->model = new CategoryRepository($category);
  }

  public function index()
  {
      $categories = $this->model->all();
      return view('admin.categories.index', compact('categories'));
  }

  public function create()
  {
      return view('admin.categories.create');
  }

  public function store(Request $request)
  {
      $this->validate($request, [
        'body' => 'required|max:500',
        'available' => 'required'
      ]);

      // create record and pass in only fields that are fillable
      $category = $this->model->create($request->only($this->model->getModel()->fillable));
      return view('admin.categories.show', compact('category'));
  }

  public function show($id)
  {
      $category =  $this->model->show($id);
      return view('admin.categories.show', compact('category'));
  }

  public function edit($id)
  {
      $category =  $this->model->show($id);
      return view('admin.categories.edit', compact('category'));
  }

  public function update(Request $request, $id)
  {
      // update model and only pass in the fillable fields
      $this->model->update($request->only($this->model->getModel()->fillable), $id);

      $category = $this->model->show($id);
      return view('admin.categories.show', compact('category'));
  }

  public function destroy($id)
  {
      $this->model->delete($id);
      $categories = $this->model->all();
      return view('admin.categories.index', compact('categories'));
  }
}
