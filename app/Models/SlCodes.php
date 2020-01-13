<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlCodes extends Model
{
    protected $table = "mmo.dbo.sl_codes";
    protected $primaryKey = 'sl_code';
    public $incrementing = false;

    protected $fillable = [
        'sl_code',
        'sl_description',
        'unit_desc',
        'item_id',
        'brand_id',
    ];

    protected $casts = [
        'sl_code' => 'string',
        'item_id' => 'string',
    ];

    public function item(){
        return $this->belongsTo('App\Models\Item', 'item_id');
    }

}
