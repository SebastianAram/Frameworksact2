<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('posts')->with('success', 'Publicacion creada');

    }

    public function index(){
        $posts = Post::all();
        $categories = Category::all();
        return view('post.index',['posts' => $posts, 'categories' => $categories]);
    }
    
    public function show($id){
        $post = Post::find($id);
        return view('post.show',['post' => $post]);
    }
    
    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->save();
        return redirect()->route('posts')->with('success', 'Publicacion actualizada');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts')->with('success', 'Publicacion eliminada');
    }
}
