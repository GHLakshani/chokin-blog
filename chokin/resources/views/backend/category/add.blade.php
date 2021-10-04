@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category/create')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                        
                        <div class="card mb-3">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>Create Category                             
                                    <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">View Data</a>
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
                                    <form method="post" action="{{url('admin/category')}}" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Title</td>
                                                <td><input class="form-control" id="title" name="title" type="text" placeholder="Title" /></td>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td><input class="form-control" id="detail" name="detail" type="text" placeholder="Details" /></td>
                                            </tr>
                                            <tr>
                                                <td>Image</td>
                                                <td><input class="form-control" id="cat_image" name="cat_image" type="file"  /></td>
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
