@extends('frontLayout')
@section('content')
            <div class="row">
			    <div class="col-md-8">
				    <div class="row mb-5"> 
                        @if(count($posts)>0)
                        @foreach($posts as $post)
                        <div clas="col-md-4">
                            <div class="card">
                            <a href="{{url('detail/'.$post->id)}}"><img  src="{{asset('images/thumb/'.$post->thumb_img)}}" class="img-thumbnail" alt="{{$post->title}}" style="width: 200px;height: 200px;"></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{url('detail/'.$post->id)}}">{{$post->title}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="alert alert-danger">No data found</p>
                        @endif
                    </div>
                    <!-- pagination -->
                    {{$posts->links()}}
                </div>
                

                <div clas="col-md-3">
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