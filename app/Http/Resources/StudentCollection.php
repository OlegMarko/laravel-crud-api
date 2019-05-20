<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['data' =>
            $this->collection->transform(function ($page) {
                return [
                    'id' => $page->id,
                    'first_name' => $page->first_name,
                    'last_name' => $page->last_name,
                    'age' => $page->age,
                    'class_id' => $page->class_id
                ];
            }),
        ];
    }
}
