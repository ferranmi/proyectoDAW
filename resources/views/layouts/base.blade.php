<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.menu')
</head>

<body class="text-center">
    <div class="container">
        <header>

            <div class="row justify-content-between align-items-center">

                <div class="col-lg-12 col-md-12">
                    <a class="cabecera" href="#">Trail Runnning World</a>
                </div>
            </div>
        </header>
        <div>
            @yield('content')
        </div>
        <div class="row ">
            @include('products')
        </div>
</body>

</html>
