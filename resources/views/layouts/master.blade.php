<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @include('layouts.head')

</head>

<body>


    @include('layouts.main-sidebar')
    <div class="main-panel">
        @include('layouts.main-headeerbar')

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('layouts.footer')
    </div>
    </div>


</body>

@include('layouts.footer-scripts')

</html>
