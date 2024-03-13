<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Bootstrap CSS version 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Include external CSS -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">

    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
</head>
<body class="antialiased">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('tasks.index') }}">Task List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('task.create') }}">Create Task</a>
                        </li>
                    </ul>
                    @auth
                    <form class="d-flex justify-content-end float-end" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Logout</button>
                    </form>
                    @endauth
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- Include bootstrap js version 5 -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Include jquery cdn version 3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Include Toastr Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Include datatable Js cdn -->
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <!-- Include session toastr Js-->
    <script>
        @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
        @endif

        @if(Session::has('error'))
        toastr.error('{{Session::get('error')}}');
        @endif

        @if ($errors->any())
            toastr.error('{{($errors->first())}}');
        @endif
    </script>
    <script>
        let token = '{{ csrf_token() }}';
    </script>
    {{-- external script for data-table and ajax --}}
    <script src="{{ asset('script.js')}}"></script>
    
</body>
</html>
