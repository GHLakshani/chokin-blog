@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category/create')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        
                        <div class="card mb-3">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>Modify Account                             
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
                                            <form method="post" action="{{url('admin/category/'.$data->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Title</td>
                                                        <td><input class="form-control" id="title" name="title" type="text" placeholder="Title" value="{{$data->title}}" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Details</td>
                                                        <td><input class="form-control" id="detail" name="detail" type="text" placeholder="Details" value="{{$data->detail}}"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>
                                                            <p class="my-2"><img src="{{asset('images')}}/{{$data->image}}" width="80"/></p>
                                                            <input type="hidden" value="{{$data->image}}" name="cat_image" />
                                                            <input class="form-control" id="cat_image" name="cat_image" type="file"  />
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