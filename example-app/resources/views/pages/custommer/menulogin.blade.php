<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template">
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="version" content="2.0.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet">
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="css/main.css" rel="stylesheet" media="all">

    <style>
        .avatar {
            width: 50px;
            height: 50px;
            padding: 50px;
            background-color: #90075D;
            border-radius: 50%;
        }
    </style>
</head>

<body style="background-color: #808080;">
    <div class="container mt-5">
        <div class="page-wrapper mt-10">
            <div class="wrapper wrapper--w900 bg-white p-6">
                <div class="card card-7 flex  items-center justify-center text-center">
                    <div class="avatar flex text-center items-center justify-center text-4xl text-white">E</div>
                </div>
                <div class="mt-10 text-2xl font-semibold items-center justify-center text-center">
                    <p>Đăng nhập</p>
                </div>
                <div class="container">
                    <div class="grid grid-cols-1">
                        <div class="font-medium mb-5">
                            <div><a href="{{route('login')}}">
                                    <div class="rounded-2xl border p-3 my-4"> Đăng Nhập Người Mua Hàng </div>
                                </a></div>
                            <div><a href="{{route('login')}}">
                                    <div class="rounded-2xl border p-3 my-4"> Đăng Nhập Người Shipper </div>
                                </a></div>
                            <div><a href="{{route('loginstore')}}">
                                    <div class="rounded-2xl border p-3 my-4"> Đăng Nhập Cửa Hàng </div>
                                </a></div>
                            <div><a href="{{route('login')}}">
                                    <div class="rounded-2xl border p-3 my-4"> Đăng Nhập Admin </div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    </div>

</body>

</html>