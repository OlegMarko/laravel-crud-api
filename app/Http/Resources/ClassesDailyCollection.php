<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassesDailyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($page) {
            return [
                'id' => $page->id,
                'title' => $page->title,
                'day' => $page->day,
                'time' => $page->time,
                'teacher_id' => $page->teacher_id
            ];
        });
    }
}
