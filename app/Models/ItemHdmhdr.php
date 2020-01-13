<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemHdmhdr extends Model
{
    protected $table = 'mmo.dbo.item_hdmhdr';
    protected $primaryKey= 'dmdcomb';
    public $incrementing = false;

    protected $fillable = [
        'dmdcomb',
        'dmdctr',
        'item_id'
    ];

    
}
