<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        // dd('test');
        $data=User::all();
        return view('backend.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'email' => 'required',
        //     'vat_number' => 'max:13',
        //     'password' => 'required|confirmed|min:6'
        // ]);

        // $user=new User;
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password=$request->password;
        // $user->save();

        // return redirect('admin/user/create')->with('success','User Has been Created');

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
        // $data=User::find($id);
        // return view('backend.user.update',['data'=>$data]);
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
        // $request->validate([
        //     'name'=>'required',
        //     'email' => 'required',
        //     'vat_number' => 'max:13',
        //     'password' => 'required|confirmed|min:6'
        // ]);

        // $user=User::find($id);
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password=$request->password;
        // $user->save();

        // return redirect('admin/user/'.$id.'/edit')->with('success','User Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::where('id',$id)->delete();
        return redirect('admin/user/');
    }
}
