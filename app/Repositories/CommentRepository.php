<?php

namespace App\Repositories;
use App\Http\Interfaces\RepoInterface;
use App\Models\Comment;

class CommentRepository implements RepoInterface
{
    
    public function all(){
        return Comment::all();
    }
    
    
    public function store($arr){
        return Comment::create($arr);
    }
    
    public function update($data,$id){
        $post = Comment::find($id);
        $post->fill($data);
        return $post->save();
    }
    
    public function delete($id){
        return Comment::findOrFail($id)->delete();
    }
}