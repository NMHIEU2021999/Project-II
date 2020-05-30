<html>

<head>
    <meta charset="UTF-8">
    <title>Race - Đăng nhập</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <div class="content-container container-fluid">
        <div class="login-form-container">
            <h1 class="login-heading">Nhập thông tin tài khoản để đăng nhập</h1>
            <form class="login-form" acction="/login" method="post" accept-charset="UTF-8">
                @csrf
                @if(isset($failed))
                <div class="row failed-login">
                    Tài khoản hoặc mật khẩu không đúng
                </div>
                @endif
                @if(isset($successRegister))
                <div class="row success-register text-primary">
                    Bạn đã đăng ký thành công và có thể đăng nhập
                </div>
                @endif
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tên đăng nhập:</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="username" placeholder="Nhập tên tài khoản">                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Mật khẩu:</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="password" class="form-control" required="required" name="password" placeholder="Nhập mật khẩu">                        
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Đăng nhập" class="btn btn-primary" style="margin:auto; margin-top:24px">
                </div>
                <div class="row" style="justify-content:center; margin-top:22px">
                    Bạn chưa có tài khoản? &nbsp;<a href="/register"><b>Đăng ký ngay!</b></a>
                </div>
            </form>
        </div>
    </div>
    @include('Footer')
</body>

</html>