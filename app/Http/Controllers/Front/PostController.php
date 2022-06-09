<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;
use App\Http\Interfaces\RepoInterface;
class PostController extends Controller
{
    protected $postRepo;
    public function __construct(RepoInterFace $postRepoInterface)
    {
        $this->postRepo = $postRepoInterface;
    }
    
    public function create(){
        $data['cats']=\App\Models\Category::select('id','name')->get();
        $data['tags']=\App\Models\Tag::select('id','name')->get();
        $data['user'] = Auth::user()->id;
        
        return view('front.post.create')->with($data);
    }
    public function store(Request $request){
        
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'user_id'=>'required',
            'cat_id'=>'required',
        ]);
        // $post_id = Post::create($data)->id;
        $post = $this->postRepo->store($data);
        $post_id = $post->id;
        foreach($request->tags_id as $tag_id)
        DB::table('post_tag')->insert([
            'post_id' => $post_id,
            'tag_id' => $tag_id,
        ]);
        if($post_id){
            return response()->json([
                'status' => true,
                'msg'    => 'Post saved successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'error message'
            ]);
        }
    }

    public function edit($id){
        $data['post'] = Post::where('id',$id)->with('tags')->get();
        $data['cats']=\App\Models\Category::select('id','name')->get();
        $data['tags']=\App\Models\Tag::select('id','name')->get();
       
        return view('front.post.edit')->with($data);
    }

    public function update(Request $request){
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'cat_id'=>'required',
        ]);
        $post = $this->postRepo->update($data,$request->id);
        // $data = ['user_id' => auth()->id()];
        if($post){
            return response()->json([
                'status' => true,
                'msg'    => 'Post saved successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg'    => 'Post unsaved unfortionatly , try again',
            ]);
        }
    }

    public function delete(Request $request){
    $post = $this->postRepo->delete($request->id);
    if(!$post){
        return response()->json([
            'status' => false,
            'msg' => 'Operation failed unfortionatly',
            'id' => $request->id,
        ]);
    }
    return response()->json([
        'status' => true,
        'msg' => 'Post Deleted Successfully',
        'id' => $request->id,
    ]);
    }

    public function showOnePost($id){
        $data['post'] = Post::findOrFail($id)->get();
        $data['comments'] = Comment::where('post_id',$id)->get();
        return view('front.post.showOnePost')->with($data);
    }
}
