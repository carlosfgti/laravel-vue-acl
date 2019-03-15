<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdatePermissionRequest;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();

        return PermissionResource::collection($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissionRequest $request)
    {
        $permission = $this->repository->create($request->all());

        return (new PermissionResource($permission))
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
        $permission = $this->repository->findOrFail($id);

        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePermissionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissionRequest $request, $id)
    {
        $permission = $this->repository->findOrFail($id);

        $permission->update($request->all());

        return new PermissionResource($permission);
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
