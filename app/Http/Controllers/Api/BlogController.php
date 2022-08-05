<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('q') !== null){
            $posts['data'] = Blog::where('title', 'like', '%' . request('q') . '%')->orderBy('created_at', 'DESC')->get();
            return response()->json($posts);
        }
        else{
            $posts = Blog::orderBy('created_at', 'DESC')->paginate(5);
            return response()->json($posts);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mainimage = request()->file('mainimage');
        $imageName = $mainimage->getClientOriginalName();
        $imageName = time().'_'.$imageName;
        $mainimage->move(public_path('/assets/img/blog'), $imageName);


        $post = new Blog;
        $post->title = $request->title;
        $post->postcontent = $request->postcontent;
        $post->mainimage = $imageName;
        $post->save();

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $b = Blog::findOrFail($blog->id);

        return response()->json($b);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $b = Blog::findOrFail($blog->id);

        // $mainimage = request()->file('mainimage');
        // $imageName = $mainimage->getClientOriginalName();
        // $imageName = time().'_'.$imageName;
        // $mainimage->move(public_path('/assets/img/books'), $imageName);

        $b->update(['title'=>$request->title]);
        $b->update(['postcontent'=>$request->postcontent]);
        // $b->update(['mainimage'=>$imageName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $b = Blog::findOrFail($blog->id);
       
        Blog::destroy($b->id);

        return response()->json($b);
    }
}
