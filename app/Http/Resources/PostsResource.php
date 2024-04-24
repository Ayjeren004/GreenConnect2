<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;

class PostsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
      return[
        'data'=>PostResource::collection($this->collection)
      ];
    }

    public function withResponse(Request $request, JsonResponse $response):void 
{
    $response->header('Content-Type','application/vnd.api+json');
}
}
