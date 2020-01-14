<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'item_id' => $this->item_id,
            'item_desc' => $this->item_desc,
            'category_id' => $this->category_id,
            'unit_desc' => $this->unit_desc,
            'homis_dms' => $this->homis_dms,
        ];
    }
}
