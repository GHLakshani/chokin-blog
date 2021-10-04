@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Posts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/post/create')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post</li>
                        </ol>
                        
                        <div class="card mb-3">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>Modify Posts                             
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
                                            <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Category <span class="text-danger">*</span></td>
                                                        <td>
                                                            <select class="form-control" name="category">
                                                                @foreach($cats as $cat)
                                                                    @if($cat->id==$data->cat_id)
                                                                        <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                                                    @else
                                                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title</td>
                                                        <td><input class="form-control" id="title" name="title" type="text" placeholder="Title" value="{{$data->title}}" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thumb Image</td>
                                                        <td>
                                                            <p class="my-2"><img src="{{asset('images/thumb')}}/{{$data->thumb_img}}" width="80"/></p>
                                                            <input type="hidden" value="{{$data->thumb_img}}" name="post_thumb" />
                                                            <input class="form-control" id="post_thumb" name="post_thumb" type="file"  />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Full Image</td>
                                                        <td>
                                                            <p class="my-2"><img src="{{asset('images/full')}}/{{$data->full_img}}" width="80"/></p>
                                                            <input type="hidden" value="{{$data->full_img}}" name="post_image" />
                                                            <input class="form-control" id="post_image" name="post_image" type="file"  />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Details</td>
                                                        <td>
                                                            <textarea class="form-control" id="detail" name="detail">{{$data->detail}}</textarea>   
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tags</td>
                                                        <td>
                                                            <textarea class="form-control" id="tags" name="tags" >{{$data->tags}}</textarea>
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