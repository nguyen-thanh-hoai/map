<!-- Primary Meta Tags -->
<title>Blog-Test</title>

<style>
    body {
        font-family: Arial, sans-serif;
    }
</style>

<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">


<div class="row">
    <div class="col-md-2 mt-3 col-2">
        <div class="sidebar">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboardstore')}}" class="nav-link bg-dark">
                        <p style="color: #fff;">
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10 col-10">

       
            <header class="header-global" id="home">
                <nav id="navbar-main" aria-label="Primary navigation" class="navbar headroom navbar-light ">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-1 col-md-1 mt-3">
                                <a class="navbar-brand" href="../process/logoutprocess.php">
                                    <img class="navbar-brand-light " src="../image/logo.png" alt="Logo dark">
                                </a>
                            </div>
                            <div class="col-11 col-md-11">
                                <div class="d-flex align-items-center offset-4">

                                    <h5 class="mr-md-3">Xin chào: </h3>
                                        <a href="" class="btn btn-outline-soft d-none d-md-inline mb-3 mr-md-3 animate-up-2" style="font-family: Arial, sans-serif;">ĐỔI MẬT KHẨU</a>
                                        <a href="" class="btn btn-outline-soft d-none d-md-inline mb-3 mr-md-3 animate-up-2" style="font-family: Arial, sans-serif;">ĐĂNG XUẤT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            </header>
            <div class="container">
                <form action="{{route('searchstorebyemail')}}" method="get">
                    <div class="row row-grid align-items-center ">
                        <div class="col-10 col-lg-10 order-lg-2">
                            <input type="text" name="keyword" class="form-control" id="timkiem" required placeholder="Tìm kiếm">
                        </div>
                        <div class="col-2 col-lg-2 order-lg-2">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 1%">STT</th>
                            <th scope="col" style="width: 29%">Email</th>
                            <th scope="col" style="width: 15%">User Name</th>
                            <th scope="col" style="width: 15%">Name Store</th>
                            <th scope="col" style="width: 20%">Ngày cập nhật</th>
                            <th scope="col" style="width: 20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($getDataStore != null)
                        @foreach($getDataStore as $value)
                        <tr>
                            <td class="text-start"></td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->namestore}}</td>
                            <td>{{$value->updated_at}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="{{route('getdatastorebyid')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                        <button type="submit" class="btn btn-dark animate-up-2">
                                        Update
                                        </button>
                                    </form>
                                    <form action="{{route('deletestoreprocess')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        <button type="submit" class="btn btn-dark animate-up-2">
                                        Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <nav aria-label="...">
                <ul class="pagination pagination-sm justify-content-center">

                </ul>
            </nav>
        
    </div>
</div>