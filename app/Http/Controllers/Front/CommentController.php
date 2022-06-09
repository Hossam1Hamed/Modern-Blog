<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Interfaces\RepoInterface;
class CommentController extends Controller
{
    protected $commentRepo;
    public function __construct(RepoInterFace $commentRepoInterface)
    {
        $this->commentRepo = $commentRepoInterface;
    }
    
    public function getCommentsByPost($id){
        $data['comments'] = Comment::where('post_id',$id)->get();
        return view('comment.index')->with($data);
    }

    public function create($id){
        $data['post'] = Post::where('id',$id)->get();
        
        return view('front.comment.create')->with($data);
    }
    public function store(Request $request){
        $data = $request->validate([
            'content'=>'required',
            'post_id' =>'required',
        ]);
        // $comment = Comment::create($data);
        $comment = $this->commentRepo->store($data);
        if($comment){
            return response()->json([
                'status' => true,
                'msg'    => 'Comment saved successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                // 'msg'    => 'Post unsaved unfortionatly , try again',
                'message' => 'error message'
            ]);
        }
    }

    public function edit($id){
        $data['comment']= Comment::findOrFail($id);
        
        return view('front.comment.edit')->with($data);
    }

    public function update(Request $request){
        $data = $request->validate([
            'content'=>'required',
        ]);
        $comment = $this->commentRepo->update($data,$request->id);
        if($comment){
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

        $comment = $this->commentRepo->delete($request->id);
        if(!$comment){
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
}
