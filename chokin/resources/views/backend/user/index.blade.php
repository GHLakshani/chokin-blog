@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/user')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>User Accounts                             
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $use)
                                        <tr>
                                            <td>{{$use->id}}</td>
                                            <td>{{$use->name}}</td>
                                            <td>{{$use->email}}</td>
                                            <td>
                                                <a onclick="return confirm('Are you Sure you want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/user/'.$use->id.'/delete')}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 @endsection('content') 