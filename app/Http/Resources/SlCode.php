<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlCode extends JsonResource
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
            'sl_code' => $this->sl_code,
            'sl_description' => $this->sl_description,
            'unit_desc' => $this->unit_desc,
            'item_id' => $this->item_id,
            'item_desc' => $this->item_id !== null ? $this->item->item_desc : null,
            'brand_id' => $this->brand_id,
            'brand_desc' => $this->brand_id !== null ? $this->brand->brand_desc : null,
            'item_unit_desc' => $this->item_id !== null ? $this->item->unit_desc : null,
        ];
    }
}
