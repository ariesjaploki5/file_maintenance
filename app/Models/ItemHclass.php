<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemHclass extends Model
{
    protected $table = 'mmo.dbo.item_hclass';
    protected $primaryKey= 'cl2comb';
    public $incrementing = false;

    protected $fillable = [
        'cl1comb',
        'cl2comb',
        'item_id'
    ];
}
