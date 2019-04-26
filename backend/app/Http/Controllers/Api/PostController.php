<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    private $repository;

    public function __construct(Post $post)
    {
        $this->repository = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->with('user', 'category')->paginate();

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $user = auth()->user();

        $post = $user->posts()->create($request->all());

        return (new PostResource($post))
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
        $post = auth()->user()->posts()->findOrFail($id);

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $user = auth()->user();

        $post = $user->posts()->findOrFail($id);

        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->posts()->findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
