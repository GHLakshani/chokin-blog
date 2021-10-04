<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=scale=1.0">
        <title>Chokin</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
        <!-- Jquery -->
        <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>
        <!-- BS4 Js -->
        <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    </head>
    <body>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">Chokin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('all-categories')}}">Category</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('register')}}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('save-post-form')}}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container mt-4">
            @yield('content')
        <main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('backend')}}/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>