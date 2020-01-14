<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'mmo.dbo.items';
    protected $primaryKey = 'item_id';

    public $incrementing = false;

    protected $casts = [
        'item_id' => 'string'
    ];

    public function sl_codes(){
        return $this->hasMany('App\Models\SlCodes', 'item_id', 'item_id');
    }

    public function homis_dms(){
        return $this->hasMany('App\Views\ItemHomisDm', 'item_id', 'item_id');
    }
}
