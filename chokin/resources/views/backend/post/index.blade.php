@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Posts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/post')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>View Data                             
                                    <a href="{{url('admin/post/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumb Image</th>
                                            <th>Full Image</th>
                                            <th>Details</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumb Image</th>
                                            <th>Full Image</th>
                                            <th>Details</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->user_id}}</td>
                                            <td>{{$post->cat_id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><img src="{{asset('images/thumb').'/'.$post->thumb_img}}" width="80" /></td>
                                            <td><img src="{{asset('images/full').'/'.$post->full_img}}" width="80" /></td>
                                            <td>{{$post->detail}}</td>
                                            <td>{{$post->tags}}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update</a>
                                                <a onclick="return confirm('Are you Sure you want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection('content')  
