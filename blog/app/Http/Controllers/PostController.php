<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;
use App\Like;
use App\Tag;
use Auth;
use Illuminate\Http\Request as Request;

class PostController extends Controller
{
    public function getIndex(){
        
        $numberOfPostsInOnePage = 3;
        $tags = Tag::all();
        $posts = Post::orderBy('title','asc')->paginate($numberOfPostsInOnePage);
        return view('blog.index',['posts'=>$posts , 'tags'=>$tags]);

    }
    public function getAdminIndex(){
        $tags = Tag::all();
        $posts = Post::orderBy('title','asc')->get();
        return view('admin.index',['posts'=>$posts , 'tags'=>$tags]);

    }
    public function getPost($id){

        $post = Post::where('id',$id)->first();
        return view('blog.post',['post'=>$post]);
    }
    public function addPostlike($id){

        $post = Post::find($id);
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();

    }
    public function addPost(Request $request){
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        $user = Auth::user();
        if(!$user){
            return redirect()->back();
        }
        $post = new Post([
            'title'=> $request->input('title'),
            'content' => $request->input('content')
        ]);
        $user->posts()->save($post);
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('admin')->with('info','New post is added');
    }
    public function viewPost($id){
        
        $post = Post::find($id);
        return view('admin.edit',['post'=>$post,'id'=>$id]);
    }
    public function editPost(Request $request){
        $request->validate([
            'title'=>'required|min:5',
            'content'=>'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // $post->tags()->detach();
        // $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        $post->sync($request->input('tags') === null ? [] : $request->input('tags'));
        $post->save();
        return redirect()->route('admin')->with('info','The post is edited successfully');
    }
    public function deletePost($id){
        $post = Post::find($id);
        if ($post != null) {
            $post->delete();
            $post->likes()->delete();
            $post->tags()->detach();
            return redirect()->route('admin')->with('info','The post is deleted successfully');
        }
        return redirect()->route('admin')->with('info','The post is deleted successfully');
    }
    public function deleteAll(){
        $posts = Post::all();
        foreach($posts as $post){
            if($post != null){
                $post->delete();
                $post->likes()->delete();
            }
        }
       
        return redirect()->route('admin');
        
        
    }

    
    
}
