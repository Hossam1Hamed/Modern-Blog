<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Category;
use App\Models\Post;
// use App\Models\User;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    var $posts;
    var $users;
    var $cats;
    public function __construct()
    {
        $this->middleware('auth');
        // $this->posts = DB::table('posts')->with('tags')->get();
        $this->posts = Post::with('tags')->get();
        $this->users = DB::table('users')->get();
        $this->cats = DB::table('categories')->get();
        
    }

    public function index()
    {
        $data['posts']=$this->posts;
        $data['users']=$this->users;
        $data['cats'] =$this->cats;
        return view('front.home')->with($data);
    }
}
