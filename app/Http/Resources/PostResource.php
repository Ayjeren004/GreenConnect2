<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'type'=>'posts',
            'id'=>$this->id,
            'attributes'=>[
            'name'=>$this->name,
            'post_image'=>$this->post_image
            ]
            
        ];
    }

public function withResponse(Request $request, JsonResponse $response):void 
{
    $response->header('Content-Type','application/vnd.api+json');
}

}
