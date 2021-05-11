<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.menu')
</head>

<body class="text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="cabecera col-lg-12 col-md-12 col-sm-12 col-12">
                Trail Running World</div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-1"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                        @yield('content')
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-1"></div>
            </div>





        </div>


    </div>
</body>

</html>
