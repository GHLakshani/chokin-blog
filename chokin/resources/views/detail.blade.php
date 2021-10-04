@extends('frontLayout')
@section('content')
                    <div class="row">
		                <div class="col-md-8">
                            @if(Session::has('success'))
                                <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="card">
                                <h5 class="card-header">
                                    {{$detail->title}}
                                    <span class="float-right">Total Views={{$detail->views}}</span>
                                </h5>
                                <img class="card-img-top" src="{{asset('images/full/'.$detail->full_img)}}" alt="{{$detail->title}}" >
                                <div class="card-body">
                                    {{$detail->detail}}
                                </div>
                                <div class="card-body">
                                    In <a href="{{url('category/'.$detail->category->id)}}">{{$detail->category->title}}</a>
                                </div>
                            </div>

                            <!-- Comment Section -->
                            @auth
                            <div class="card my-5">
                                <h5 class="card-header">Add Comment</h5>
                                <div class="card-body">
                                    <form method="post" action="{{url('save-comment/'.$detail->id)}}"> 
                                    @csrf
                                        <textarea class="form-control" name="comment"></textarea>
                                        <input type="submit" class="btn btn-dark mt-2"/>
                                    </form>
                                </div>
                            </div>
                            @endauth

                            <div class="card my-4">
                                <h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
                                <div class="card-body">
                                    @if($detail->comments)
                                        @foreach($detail->comments as $comment)
                                            <blockquote class="blockquote">
                                                <p class="mb-0">{{$comment->comment}}</p>
                                                @if($comment->user_id==0)
                                                <footer class="blockquote-footer"><cite title="Source Title">Admin</cite></footer>
                                                @else
                                                <footer class="blockquote-footer"><cite title="Source Title">{{$comment->user->name}}</cite></footer>
                                                @endif
                                            </blockquote>
                                            <hr>
                                        @endforeach
                                    @endif
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