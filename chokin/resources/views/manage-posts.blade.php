@extends('frontLayout')
@section('content')
        <div class="row">
			    <div class="col-md-8 mb-5">                    
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>Manage Posts                             
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Thumb Image</th>
                                    <th>Full Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Thumb Image</th>
                                    <th>Full Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                                    <tbody>
                                        @foreach($data as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->category->title}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><img src="{{asset('images/thumb').'/'.$post->thumb_img}}" width="80" /></td>
                                            <td><img src="{{asset('images/full').'/'.$post->full_img}}" width="80" /></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{url('update-posts/'.$post->id)}}">Update</a>
                                                <a onclick="return confirm('Are you Sure you want to Delete?')" class="btn btn-danger btn-sm" href="{{url('manage-posts/'.$post->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
                

                <div clas="col-md-4">
                    <!-- Search -->
                    <div class="card mb-3 shadow">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="{{url('/')}}">
                                <div class="input-group ">
                                    <input type="text" name="s" class="form-control" >
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>     
                    
                    <!-- Recent Posts -->
                    <div class="card mb-3 shadow">
                        <div class="card-header">Recent Posts</div>
                        <div class="list-group list-group-flush">
                            @if($recent_posts)
                                @foreach($recent_posts as $post)
                                    <a href="#" class="list-group-item">{{$post->title}}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Popular Posts -->
                    <div class="card mb-3 shadow">
                        <div class="card-header">Popular Posts</div>
                        <div class="list-group list-group-flush">
                            @if($popular_posts)
                                @foreach($popular_posts as $post)
                                    <a href="#" class="list-group-item">{{$post->title}} <span class="badge badge-dark float-right">{{$post->views}}</span></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
        </div>
@endsection('content')      