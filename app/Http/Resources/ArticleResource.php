<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'articles';

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "desc" => $this->description
        ];
    }

    public function with($request) {
        return [
            "success" => true
        ];
    }
}
