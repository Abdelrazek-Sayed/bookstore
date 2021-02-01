<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       

       
      //  return parent::toArray($request);
      return [
                 
                'id'=>$this->id,
                'name'=>$this->name,
                'desc'=>$this->desc,
                'img'=> asset('uploads/'.$this->img),
                'cat_id'=>$this->cat_id,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at,
                'category'=> new CatResource($this->cat),
              ];
             
    }
}
