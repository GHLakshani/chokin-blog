@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Comments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>View Comments   
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Post </th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Post </th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>@if(!empty($comment->user_id)){{$comment->user->email}} @endif</td>
                                            <td>{{$comment->post_id}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <a onclick="return confirm('Are you Sure you want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/comment/'.$comment->id.'/delete')}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection('content')    
