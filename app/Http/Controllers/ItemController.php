<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;

class ItemController extends Controller
{
  protected $model;

  public function __construct(Item $item)
  {
      // set the model
      $this->model = new ItemRepository($item);
  }

  public function index()
  {
      $items = $this->model->all();
      return view('admin.items.index', compact('items'));
  }

  public function create()
  {
      $categories = (new CategoryRepository(new Category))->availableForList();
      return view('admin.items.create', compact('categories'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|max:500',
          'price' => 'required|min:0|numeric',
          'cost' => 'required|min:0|numeric',
          'category_id' => 'required|numeric|min:0'
      ]);

      // create record and pass in only fields that are fillable
      $item = $this->model->create($request->only($this->model->getModel()->fillable));
      return view('admin.items.show', compact('item'));
  }

  public function show($id)
  {
      $item =  $this->model->show($id);
      return view('admin.items.show', compact('item'));
  }

  public function edit($id)
  {
      $item =  $this->model->show($id);
      $categories = (new CategoryRepository(new Category))->availableForList();
      return view('admin.items.edit', compact('item', 'categories'));
  }

  public function update(Request $request, $id)
  {
      // update model and only pass in the fillable fields
      $this->model->update($request->only($this->model->getModel()->fillable), $id);

      $item = $this->model->show($id);
      return view('admin.items.show', compact('item'));
  }

  public function destroy($id)
  {
      $this->model->delete($id);
      $items = $this->model->all();
      return view('admin.items.index', compact('items'));
  }
}
