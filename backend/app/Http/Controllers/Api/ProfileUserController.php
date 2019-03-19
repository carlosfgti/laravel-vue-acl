<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;

class ProfileUserController extends Controller
{
    public function userProfiles($idUser)
    {
        $user = User::with('profiles')->findOrFail($idUser);

        return new UserResource($user);
    }
}
