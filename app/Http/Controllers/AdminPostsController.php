<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        //Post::orderBy('id', 'DESC')->get().var
        $posts = Post::orderBy('id', 'DESC')->get();
        //'posts'會跟admin.posts.index中的route('.posts.')一樣
        //<a class="btn btn-success btn-sm" href="{{ route('admin.posts.create') }}">新增</a>
        $data=[
            'posts'=>$posts,
        ];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        //dump &die
        //dd($request->all());
        return redirect()->route('admin.posts.create');
    }

    public function edit(Post $post)
    {
       $data=[
           'post'=>$post,
       ];
        return view('admin.posts.edit',$data);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        //
    }
}
