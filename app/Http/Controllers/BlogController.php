<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $blogs = Blog::latest()->paginate(5);

        //return collection of posts as a resource
        return new BlogResource(true, 'List Data Posts', $blogs);
    }
}
