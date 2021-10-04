<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\Post;
use App\Comment;
use App\User;

class AdminController extends Controller
{
    //Login View
    function login(){
        return view('backend.login');
    }

    //submit login
    function submit_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('error','Invalid Username / Password!!!');
        }
    }

    //dashboard
    function dashboard(){
        $posts=post::orderBy('id','desc')->get();
        return view('backend.dashboard',['posts'=>$posts]);
    }

    function comments(){
        $data=Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]);
    }

    function delete_comment($id){
        Comment::where('id',$id)->delete();
        return redirect('admin/comment/');
    }

    //logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
