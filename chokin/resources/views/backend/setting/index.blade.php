<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chokin </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        @if(!Session::has('adminData'))
            <script type="text/javascript">
                window.location.href="{{url('admin/login')}}";
            </script>
        @endif
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Chokin - Admin </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="{{url('admin/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{url('admin/category/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="{{url('admin/user/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                                Posts
                            </a>
                            <a class="nav-link" href="{{url('admin/user/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Comments
                            </a>
                            <a class="nav-link" href="{{url('admin/user/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="{{url('admin/setting/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Setting
                            </a>
                            <a class="nav-link" href="{{url('admin/logout')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        @if(Session::has('adminData'))
                            <div class="small">Logged in as: Admin</div>   
                        @endif
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>