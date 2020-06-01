<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Branch;
use App\Item_branch;

class ItemRepository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }

    public function allForList()
    {
        return $this->model->pluck('name', 'id');
    }

    // create a new record in the database
    public function create(array $data)
    {
        // return $this->model->create($data);

        $created_item =  $this->model->create($data);
        $branches = (new BranchRepository(new Branch))->all();
        $item_branch = new Item_branchRepository(new Item_branch);

        foreach($branches as $branch){
          $item_branch->create([
            'item_id' => $created_item->id,
            'branch_id' => $branch->id,
            'initial_quantity' => 0,
            'current_quantity' => 0
          ]);
        }

        return $created_item;
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function conditions($conditions)
    {
        $model = $this->model;
        foreach ($conditions as $key => $condition) {
          $model = $model->where($key, $condition);
        }
        return $model->first();
    }
}
