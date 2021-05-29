<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.menu')
</head>

<body class="text-center">
    <div class="container-fluid ">
        <header>
            <div class="row">
                <div class="col-lg-12 d-flex h-200 justify-content-center align-items-center col-md-12 col-sm-12 imagen_inicio ">
                        <a class="cabecera text-danger" href="/">Trail Runnning World</a>
                </div>
            </div>
        </header>
        <div>
            @include('include.menu-nav')
        </div>
        <div class="row div-double">
            @yield('products')
        </div>
    </div>
    <footer>
        <div class=" blog-footer bg-dark position-relative">
            <div class="col-lg-12 col-md-12">
                @include('include.footer')
            </div>
        </div>
    </footer>
</body>
</html>
