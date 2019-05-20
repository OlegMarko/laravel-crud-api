<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
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
                    'job_title' => $page->job_title,
                    'age' => $page->age
                ];
            }),
        ];
    }
}
