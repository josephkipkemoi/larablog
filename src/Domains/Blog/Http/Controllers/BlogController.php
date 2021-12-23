<?php

namespace Domains\Blog\Http\Controllers;

use Domains\Blog\DTO\CreateBlogDTO;
use Domains\Blog\DTO\UpdateBlogDTO;
use Domains\Blog\Http\Requests\CreateBlogRequest;
use Domains\Blog\Http\Requests\UpdateBlogRequest;
use Domains\Blog\Models\Blog;

 class BlogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Get resource based on user id
    public function index(Blog $blog)
    {
        // return $blog->user()->paginate(5);
        return  Blog::paginate(5);
    }

    // Store resource to Database
    public function store(Blog $blog,CreateBlogRequest $request)
    {
        //
        return $blog->create((array) new CreateBlogDTO(...$request->validated()));
    }

    // Update resource by id
    public function update(Blog $blog,UpdateBlogRequest $request)
    {
        return tap($blog)->update((array) new UpdateBlogDTO(...$request->validated()) );
    }

    // Get resource by id
    public function show($id)
    {
        return Blog::findOrFail($id);
    }

    // Remove resource by ID
    public function destroy(Blog $blog)
    {
        return $blog->delete();
    }
}
