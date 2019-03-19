<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class PermissionProfileController extends Controller
{
    public function profilePermissions($idProfile)
    {
        $profile = Profile::with('permissions')->findOrFail($idProfile);

        return new ProfileResource($profile);
    }

    public function permissionsNotLinkedProfile($idProfile)
    {
        $permissions = Permission::whereDoesntHave('profiles', function($query) use ($idProfile) {
            $query->where('profile_id', $idProfile);
        })->get();

        return PermissionResource::collection($permissions);
    }

    public function profileAddPermissions(Request $request, $idProfile)
    {
        $profile = Profile::findOrFail($idProfile);

        $profile->permissions()->attach($request->permissions);

        return response()->json(null, 201);
    }
}
