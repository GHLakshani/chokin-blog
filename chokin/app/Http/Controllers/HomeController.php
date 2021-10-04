<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    function index(Request $request)
    {
        if($request->has('s')){
            $s=$request->s;
            $posts=Post::where('title','like','%'.$s.'%')->orderBy('id','desc')->paginate(2);
        }
        else{
            $posts=Post::orderBy('id','desc')->paginate(2);
        }
        
        return view('home',['posts'=>$posts]);
    }

    function detail(Request $request,$postId)
    {
        $detail=Post::find($postId);
        
        return view('detail',['detail'=>$detail]);
    }
}
