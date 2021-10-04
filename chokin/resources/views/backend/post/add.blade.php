@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Posts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category/create')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                        
                        <div class="card mb-3">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>Create Post                             
                                    <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">View Data</a>
                            </div>
                            <div class="card-body">
                                        @if($errors)
                                            @foreach($errors->all() as $error)
                                            <p class="text-danger">{{$error}}</p>
                                            @endforeach
                                        @endif

                                        @if(Session::has('success'))
                                        <p class="text-success">{{session('success')}}</p>
                                        @endif
                                <div class="table-responsive">
                                    <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Category <span class="text-danger">*</span></td>
                                                <td>
                                                    <select class="form-control" name="category">
                                                        @foreach($cats as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Title <span class="text-danger">*</span></td>
                                                <td><input class="form-control" id="title" name="title" type="text" placeholder="Title" /></td>
                                            </tr>
                                            <tr>
                                                <td>Thumbnail</td>
                                                <td><input class="form-control" id="post_thumb" name="post_thumb" type="file"  /></td>
                                            </tr>
                                            <tr>
                                                <td>Full Image</td>
                                                <td><input class="form-control" id="post_image" name="post_image" type="file"  /></td>
                                            </tr>
                                            <tr>
                                                <td>Details <span class="text-danger">*</span></td>
                                                <td>
                                                    <textarea class="form-control" id="detail" name="detail"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tags</td>
                                                <td>
                                                    <textarea class="form-control" id="tags" name="tags"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" class="btn btn-primary btn-block" style="width:100%" /></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
 @endsection('content')  
