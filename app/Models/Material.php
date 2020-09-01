<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name',
        'warranty',
        'spot',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'removed_at',
        'removed_by',
        'removed_commentary',
        'state_id',
        'supplier_id',
        'category_id',
        'warehouse_id'
    ];

    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function warehouse(){
        return $this->belongsTo('App\Models\Warehouse');
    }

}
