    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Css -->
    <link href="../assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="../assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
    <link href="../assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Css -->
    <link href="../assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet">
    <link href="../assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
@INCLUDE('partial.topheader')
<body>
<div class="container">
    <div class="grid lg:grid-cols-4 grid-cols-1 gap-6 mt-10">
        @foreach($getDataFoods as $valueFood)
        <div class="relative text-center ">
            <img src="../uploads/{{$valueFood->img_food}}"  alt="">
            <h2>{{$valueFood->name}}</h2>
            @if(Auth::user()!= null)
            <a href="{{route('registercart',$valueFood->id)}}" class="bg-dark rounded-2xl p-1">Them vao gio hang</a>
            @endif
        </div>
        @endforeach
    </div>
</div>
</body>
@INCLUDE('partial.footer')