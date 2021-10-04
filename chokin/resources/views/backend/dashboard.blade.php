@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">{{App\Category::count()}} Categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/admin/category')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">{{App\Post::count()}} Posts</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/admin/post')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">{{App\Comment::count()}} Comments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/admin/comment')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">{{App\User::count()}} Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/admin/user')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->user_id}}</td>
                                            <td>{{$post->category->title}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><img src="{{asset('images/thumb').'/'.$post->thumb_img}}" width="80" /></td>
                                            <td><img src="{{asset('images/full').'/'.$post->full_img}}" width="80" /></td>
                                            <td>{{$post->detail}}</td>
                                            <td>{{$post->tags}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection('content')                 