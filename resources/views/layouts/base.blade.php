<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.menu')
</head>

<body class="text-center">
    <div class="container-fluid ">
        <header>
            <div class="row justify-content-between align-items-center">
                <img class="position-absolute" src="{{asset("images/Mountains-Green.jpg") }}"  style="width: 100%; height: 60px; ">
                <div class="col-lg-12 col-md-12 col-sm-12  ">
                    <a class="cabecera" href="/">Trail Runnning World</a>
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
