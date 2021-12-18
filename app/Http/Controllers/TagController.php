<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function __invoke(Tag $tag, CreateTagRequest $request)
    {
        return $tag->create($request->validated());
    }
}