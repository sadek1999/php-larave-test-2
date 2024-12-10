<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'user'=>new userResource($this->user),
            'upvoteCount'=>$this->upvoteCount?:0,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
            'user_has_upvote'=>(bool)$this->user_has_upvote,
            'user_has_downvote'=>(bool)$this->user_has_downvote,
        ];
    }
}
