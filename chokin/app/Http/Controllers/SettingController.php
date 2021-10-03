<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

class SettingController extends Controller
{
    function index(){
        $setting=Setting::first();
        return view('backend.setting.index',['setting'=>$setting]);
    }

    function save_settings(Request $request){
        $countData=Setting::count();
        if($countData==0)
        {
            $data=new Setting;
            $data->comment_auto_approve=$request->comment_auto_approve;
            $data->user_auto_approve=$request->user_auto_approve;
            $data->recent_post_limit=$request->recent_post_limit;
            $data->popular_post_limit=$request->popular_post_limit;
            $data->recent_comment_limit=$request->recent_comment_limit;        
            $data->save();
        }
        else{
            $firstData=Setting::first();
            $data=Setting::find($firstData->id);
            $data->comment_auto_approve=$request->comment_auto_approve;
            $data->user_auto_approve=$request->user_auto_approve;
            $data->recent_post_limit=$request->recent_post_limit;
            $data->popular_post_limit=$request->popular_post_limit;
            $data->recent_comment_limit=$request->recent_comment_limit;   
            $data->save();
        }
        


        

        return redirect('admin/setting')->with('success','Data Has been Updated');
    }
}
