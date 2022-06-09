<?php

namespace App\Repositories;
use App\Http\Interfaces\RepoInterface;
use App\Models\Post;

class PostRepository implements RepoInterface
{
    
    public function all(){
        return Post::all();
    }
    
    
    public function store($arr){
        return Post::create($arr);
    }
    
    public function update($data,$id){
        $post = Post::find($id);
        $post->fill($data);
        return $post->save();
    }
    
    public function delete($id){
        return Post::findOrFail($id)->delete();
    }
}