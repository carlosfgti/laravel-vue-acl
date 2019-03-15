<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateProfileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return ProfileResource::collection($profiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfileRequest $request)
    {
        $profile = $this->repository->create($request->all());

        return (new ProfileResource($profile))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $this->repository->findOrFail($id);

        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfileRequest $request, $id)
    {
        $profile = $this->repository->findOrFail($id);

        $profile->update($request->all());

        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
