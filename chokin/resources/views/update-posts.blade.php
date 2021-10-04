@extends('frontLayout')
@section('content')
        <div class="row">
			    <div class="col-md-8 mb-5">                    
                    <div class="card-body">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>Update Post   
                                <a href="{{url('manage-posts')}}" class="float-right btn btn-sm btn-dark">Manage Data</a>               
                            </div>
                        @if($errors)
                            @foreach($errors->all() as $error)
                                <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif

                        @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                        @endif
                        <div class="table-responsive">
                        <form method="post" action="{{url('update-posts/'.$data->id)}}" enctype="multipart/form-data">
                                                @csrf
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