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
            <div class="grid grid-cols-2 lg:grid-cols-2">
                    <div>
                        <img src="../uploads/{{$getdata[0]->img_food}}" alt="">
                    </div>
                    <div class="text-start">
                        <h1>{{$getdata[0]->name}}</h1>
                        <h2>{{$getdata[0]->description}}</h2>
                        <h2>{{$getdata[0]->price}}</h2>
                        <form action="" method="post">
                        <div class="flex text-center items-center">
                            <label >Quantity: </label>
                            <input type="number" class="quantity" value="1" min = "1">
                        </div>
                        <button type="submit">Add to cart</button>
                        </form>
                    </div>
            </div>
        </div>
        <script>
            let quantity = 1;

            function increaseQuantity() {
                quantity++;
                document.querySelector(".quantity").textContent = quantity;
            }

            function decreaseQuantity() {
                if (quantity < 2) {
                    quantity = 1;
                    document.querySelector(".quantity").textContent = quantity;
                } else {
                    quantity--;
                    document.querySelector(".quantity").textContent = quantity;
                }
            }

            const buttonIncrease = document.querySelector(".button-increase");
            buttonIncrease.addEventListener("click", increaseQuantity);

            const buttonDecrease = document.querySelector(".button-decrease");
            buttonDecrease.addEventListener("click", decreaseQuantity);
        </script>
    </body>
    @INCLUDE('partial.footer')