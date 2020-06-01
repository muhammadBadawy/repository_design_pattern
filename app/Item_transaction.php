<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_transaction extends Model
{
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
