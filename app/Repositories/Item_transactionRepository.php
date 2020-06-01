<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Item_branch;

class Item_transactionRepository implements RepositoryInterface
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

    // create a new record in the database
    public function create(array $data)
    {

        $conditions = [
          'item_id' => $data['item_id'],
          'branch_id' => $data['branch_id']
        ];

        $item_branch_model = (new Item_branchRepository(new Item_branch))->conditions($conditions);

        if(!$item_branch_model){
          return false;
        }

        if($data['type'] == 0){
          $new_quantity = $item_branch_model->current_quantity + $data['quantity'];
        }
        else{
          $new_quantity = $item_branch_model->current_quantity - $data['quantity'];
        }

        if($data['type'] == 0){
          $data['employee_id'] = null;
        }
        else{
          if($new_quantity < 0){
            return false;
          }
        }

        $item_transaction_model = $this->model->create($data);


        (new Item_branchRepository(new Item_branch))->update(['current_quantity' => $new_quantity], $item_branch_model->id);


        return $item_transaction_model;
    }

    // update record in the database
    public function update(array $data, $id)
    {

        $record = $this->model->find($id);

        $conditions = [
          'item_id' => $data['item_id'],
          'branch_id' => $data['branch_id']
        ];

        $item_branch_model = (new Item_branchRepository(new Item_branch))->conditions($conditions);

        if(!$item_branch_model){
          return false;
        }

        if($data['type'] != $record['type'])
        {
          if($record['type'] == 0){
            $new_quantity = $item_branch_model->current_quantity - (2 * $record['quantity']);
          }
          else{
            $new_quantity = $item_branch_model->current_quantity + (2 * $record['quantity']);
          }
          (new Item_branchRepository(new Item_branch))->update(['current_quantity' => $new_quantity], $item_branch_model->id);
        }

        // $data['quantity'] = $new_quantity;

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
}
