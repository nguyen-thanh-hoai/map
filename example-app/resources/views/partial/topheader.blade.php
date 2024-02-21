    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Css -->
    <link href="assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
    <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Css -->
    <link href="assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet">
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/tailwind.css">

<header>
    <div class="container "style="background-color: #00b14f;">
        <div class="relative">
            <div><img src="../img/logo.png" alt=""></div>
            <div class="absolute top-6 end-0 flex justify-center items-center">
                @if(Auth::user()!= null)
                <a href="{{route('showCart')}}">
                <div class="uil uil-shopping-basket mx-3 p-4 rounded" style="background-color: #fff;"></div>
                </a>
                @endif
                @if(Auth::user()== null)
                <div class="mx-3 p-4 rounded" style="background-color: #fff;"><a href="{{route('login')}}">Đăng Nhập / Đăng Ký</a></div>
                @endif
                @if(Auth::user()!= null)
                @if(Auth::user()->role != 2)
                <div class="mx-3 p-4 rounded" style="background-color: #fff;"><a href="{{route('getdatauserbyid', Auth::user()->id)}}">Đăng ký cửa hàng</a></div>
                @endif
                @endif
                @if(Auth::user()!= null)
                <a href="{{route('logout')}}">
                <div class="mx-3 p-3 rounded" style="background-color: #fff;"> Đăng xuất</div>
                </a>
                @endif
            </div>
        </div>
    </div>
</header>