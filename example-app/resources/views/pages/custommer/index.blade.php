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
    @INCLUDE('partial.topheader')
    <body>
        <div class="container" style="border-top-width: 2px ; border-top-color: #92a8d1; background-color: #fff;">
            <div><h1 class="text-2xl ">CỬA HÀNG</h1></div>
            <div class="grid lg:grid-cols-4 grid-cols-1">
                @foreach($getDataStore as $value)
                <div>
                    <div class="rounded"><img src="uploads/{{$value->img_store}}" style="width: 100px; height: 100px;" alt=""></div>
                    <div>
                        <a href="{{route('showdetailstore', $value->id)}}"><p>{{$value->namestore}}</p></a>
                    </div>
                    <div class="flex items-center">
                        <div class="uil uil-star"></div>
                        <div>
                            <p>5.0</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        

        <div class="container">
        <div><h1 class="text-2xl ">MÓN ĂN</h1></div>
            <div class="grid lg:grid-cols-4 grid-cols-1">
                @foreach($getDataFoods as $valueFood)
                <div>
                    <div><img src="uploads/{{$valueFood['img_food']}}" style="width: 100px; height: 100px;" alt=""></div>
                    <div>
                        <a href="{{route('getfoodbyidfordetailfood', $valueFood['id'])}}">
                        <p>{{$valueFood['name']}}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
    @INCLUDE('partial.footer')