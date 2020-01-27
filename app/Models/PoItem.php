<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoItem extends Model
{
    protected $table = 'bms_pmo.dbo.bms_po_items';

    protected $fillable = [
        'item_code'
    ];

    public function item(){
        return $this->belongsTo('App\Models\Item', 'item_code', 'item_id');
    }
}
