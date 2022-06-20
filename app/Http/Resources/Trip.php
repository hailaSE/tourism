<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Trip extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=>$this->id,
            'governorate_id'=>$this->governorate_id,
            'offer_id'=>$this->offer_id,
            'tourist_guide_id'=>$this->tourist_guide_id,
            'transport_id'=>$this->transport_id,
            'name'=>$this->name,
            'trip_date'=>$this->trip_date,
            'cost'=>$this->cost,
            'starts_at'=>$this->starts_at,
            'ends_at'=>$this->ends_at,
            'tripType'=>$this->tripType,
            'details'=>$this->details,
            'cost_after_offer'=>$this->cost_after_offer,

        ];
    }


}
