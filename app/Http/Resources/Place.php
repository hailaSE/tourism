<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Place extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return[
           'id'=>$this->id,
           'id_type_of_place'=>$this->id_type_of_place,
           'id_governorate'=>$this->id_governorate,
           'name'=>$this->name,
           'evaluation'=>$this->evaluation,
           'details'=>$this->details,
           'phoneNumber'=>$this->phoneNumber,
       ];
    }

}
