<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_branch extends Model
{
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
