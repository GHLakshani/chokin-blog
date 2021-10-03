<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('backend.category.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().".".$image->getClientOriginalExtension();
            $dest=public_path('/images');
            $image->move($dest,$reImage);
        } 
        else{
            $reImage='na';
        }     

        $category=new Category;
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/create')->with('success','Category Has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('backend.category.update',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().".".$image->getClientOriginalExtension();
            $dest=public_path('/images');
            $image->move($dest,$reImage);
        }
        else{
            $reImage=$request->cat_image;
        }

        $category=Category::find($id);
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/'.$id.'/edit')->with('success','Category Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::where('id',$id)->delete();
        return redirect('admin/category/');
    }
}
