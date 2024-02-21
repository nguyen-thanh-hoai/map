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
        <div class="flex mt-10">
          <a href="{{route('showCart')}}">
            <div class="mx-3 p-3 text-white bg-dark rounded">Sản phẩm chờ xác nhận</div>
          </a>
          <a href="{{route('showinfocartconfirm')}}">
            <div class="mx-3 p-3 text-white bg-dark rounded">Đơn đã xác nhận</div>
          </a>
          <a href="{{route('showinfocartdone')}}">
            <div class="mx-3 p-3 text-white bg-dark rounded">Đơn đã xong</div>
          </a>
        </div>
        <div class="grid lg:grid-cols-4 grid-cols-1 gap-6 mt-10 ">
          @foreach($getDataItemCart as $value_cart)
          <div class="relative">
            <img src="../uploads/{{$value_cart->img_food}}" alt="">
            <h2>{{$value_cart->name_food}}</h2>
            <h2>Price: {{$value_cart->price_food}}</h2>
            <h2>Quantity: {{$value_cart->quantity}}</h2>
          </div>
          @endforeach
        </div>
        <div class="flex mt-10 items-center">
          <h1 class="text-2xl">Tổng tiền: {{$totalPrice}}</h1>
        </div>
      </div>
      
    </body>
    @INCLUDE('partial.footer')