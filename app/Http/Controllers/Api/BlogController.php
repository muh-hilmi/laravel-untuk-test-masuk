<?php

namespace App\Http\Controllers\Api;


use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
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

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            // 'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'name'     => 'required',
            'title'     => 'required',
            'desc'     => 'required',
            'author'     => 'required',
            // 'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $blog = Blog::create([
            // 'image'     => $image->hashName(),
            // 'name'     => $request->name,
            'title'     => $request->title,
            'desc'     => $request->desc,
            'author'     => $request->author,
            // 'content'   => $request->content,
        ]);

        //return response
        return new BlogResource(true, 'Data blog Berhasil Ditambahkan!', $blog);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Blog $blog)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/' . $blog->image);

            //update post with new image
            $blog->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {

            //update post without image
            $blog->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        //return response
        return new BlogResource(true, 'Data Post Berhasil Diubah!', $blog);
    }

    public function destroy(Blog $blog)
    {
        // //delete image
        // Storage::delete('public/posts/' . $blog->image);

        //delete post
        $blog->delete();

        //return response
        return new BlogResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
