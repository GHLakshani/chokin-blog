@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Setting</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category/create')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                        
                        <div class="card mb-3">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>Manage Settings                           
                                    <!-- <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">View Data</a> -->
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
                                    <form method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Comment Auto Approve</td>
                                                <td><input class="form-control" id="comment_auto_approve" name="comment_auto_approve" type="text"  @if($setting) value="{{$setting->comment_auto_approve}}" @endif /></td>
                                            </tr>
                                            <tr>
                                                <td>User Auto Approve</td>
                                                <td><input class="form-control" id="user_auto_approve" name="user_auto_approve" type="text"  @if($setting) value="{{$setting->user_auto_approve}}" @endif /></td>
                                            </tr>
                                            <tr>
                                                <td>Recent Post Limit</td>
                                                <td><input class="form-control" id="recent_post_limit" name="recent_post_limit" type="text"  @if($setting) value="{{$setting->recent_post_limit}}" @endif /></td>
                                            </tr>
                                            <tr>
                                                <td>Populat Post Limit</td>
                                                <td><input class="form-control" id="popular_post_limit" name="popular_post_limit" type="text" @if($setting) value="{{$setting->popular_post_limit}}" @endif /></td>
                                            </tr>
                                            <tr>
                                                <td>Recent Comment Limit</td>
                                                <td><input class="form-control" id="recent_comment_limit" name="recent_comment_limit" type="text" @if($setting) value="{{$setting->recent_comment_limit}}" @endif /></td>
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