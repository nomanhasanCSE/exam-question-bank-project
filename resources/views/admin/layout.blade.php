
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam Question System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{('/')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{('/')}}">Home</a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link class="btn btn-outline-success" :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
{{--            <form class="d-flex" role="search">--}}
{{--                 <div class="">--}}
{{--                    <a href="{{route('student.index')}}" class="btn btn-outline-success me-2">Student</a>--}}
{{--                    <a href="{{route('admin.create')}}" class="btn btn-outline-success">admin</a>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
    </div>
</nav>

@yield('content')
@stack('script')
@stack('css')
</body>
</html>
