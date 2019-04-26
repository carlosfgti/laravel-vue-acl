<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified' => (boolean) $this->email_verified_at,
            'profiles' => ProfileResource::collection($this->whenLoaded('profiles')),
            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
