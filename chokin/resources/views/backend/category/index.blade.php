@extends('layout')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/category')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>View Data                             
                                    <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->title}}</td>
                                            <td>{{$cat->detail}}</td>
                                            <td><img src="{{asset('images').'/'.$cat->image}}" width="100" /></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{url('admin/category/'.$cat->id.'/edit')}}">Update</a>
                                                <a onclick="return confirm('Are you Sure you want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$cat->id.'/delete')}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection('content')    
