<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class PermissionProfileController extends Controller
{
    public function profilePermissions($idProfile)
    {
        $profile = Profile::with('permissions')->findOrFail($idProfile);

        return new ProfileResource($profile);
    }
}
