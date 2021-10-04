<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\Category;

class HomeController extends Controller
{
    function index(Request $request)
    {
        if($request->has('s')){
            $s=$request->s;
            $posts=Post::where('title','like','%'.$s.'%')->orderBy('id','desc')->paginate(10);
        }
        else{
            $posts=Post::orderBy('id','desc')->paginate(10);
        }
        
        return view('home',['posts'=>$posts]);
    }

    function detail(Request $request,$postId)
    {
        Post::find($postId)->increment('views');
        $detail=Post::find($postId);
        
        return view('detail',['detail'=>$detail]);
    }

    function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('categories',['categories'=>$categories]);
    }

    function category_posts(Request $request,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(10);
        return view('category',['posts'=>$posts,'category'=>$category]);
    }

    function save_comment(Request $request,$id)
    {
        $request->validate([
            'comment'=>'required'
        ]);

        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();

        return redirect('detail/'.$id)->with('success','Comment Has been Submited');
    }

    function save_post_form()
    {
        $cats=Category::all();
        return view('save-post-form',['cats'=>$cats]);
    }

    function save_post_data(Request $request){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        //Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().".".$image1->getClientOriginalExtension();
            $dest=public_path('/images/thumb');
            $image1->move($dest,$reThumbImage);
        } 
        else{
            $reThumbImage='na';
        }
        
        //Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().".".$image2->getClientOriginalExtension();
            $dest=public_path('/images/full');
            $image2->move($dest,$reFullImage);
        } 
        else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb_img=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post Has been Added');
    }

    function manage_posts(Request $request){
        $posts=Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return view('manage-posts',['data'=>$posts]);
    }

    function edit_posts($id){
        $cats=Category::all();
        $data=Post::find($id);
        return view('update-posts',['cats'=>$cats,'data'=>$data]);
    }

    function update_posts(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required'
        ]);

        //Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().".".$image1->getClientOriginalExtension();
            $dest=public_path('/images/thumb');
            $image1->move($dest,$reThumbImage);
        } 
        else{
            $reThumbImage=$request->post_thumb;
        }
        
        //Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().".".$image2->getClientOriginalExtension();
            $dest=public_path('/images/full');
            $image2->move($dest,$reFullImage);
        } 
        else{
            $reFullImage=$request->post_image;
        }

        $post=Post::find($id);
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb_img=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('update-posts/'.$id)->with('success','Post Has been Updated');
    }

    function destroy_posts($id){
        $post=Post::where('id',$id)->delete();
        return redirect('manage-posts/');
    }
}
