<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    private $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }
    
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();

            $token = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'token' => $token,
            ]);
        }

        return response()->json([
            'error' => 'Unauthorised',
        ], 401);
    }
}
