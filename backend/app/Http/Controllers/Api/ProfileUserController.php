<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class ProfileUserController extends Controller
{
    public function userProfiles($idUser)
    {
        $user = User::with('profiles')->findOrFail($idUser);

        return new UserResource($user);
    }

    public function profilesNotLinkedUser($idUser)
    {
        $profiles = Profile::whereDoesntHave('users', function($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->get();

        return ProfileResource::collection($profiles);
    }
}
