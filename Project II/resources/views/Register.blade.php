<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Đăng ký</title>
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
        <div class="register-form-container">
            <h1 class="register-heading">Điền thông tin cá nhân để đăng ký</h1>
            <form class="register-form" method="post" accept-charset="UTF-8" action="/register">
                @csrf
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tên đăng nhập (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="username" placeholder="Nhập tên tài khoản">
                    </div>
                </div><div class="row">
                    <div class="col-2 failed-register" style="margin-left: auto">
                    </div>
                    <div class="col-4 register-failed" style="margin-right: auto">
                    @if(isset($invalids) &&  array_key_exists('username', $invalids))
                        Tài khoản đã được sử dụng, vui lòng chọn tài khoản khác!
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Mật khẩu (<i class="fa fa-asterisk require" aria-hidden="true"></i>): </b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="password" class="form-control" required="required" name="password" placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Xác nhận mật khẩu (<i class="fa fa-asterisk require" aria-hidden="true"></i>): </b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="password" class="form-control" required="required" name="passwordId" placeholder="Xác nhận lại mật khẩu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                    </div>
                    <div class="col-4 register-failed" style="margin-right: auto">
                    @if(isset($invalids) && array_key_exists('passwordId', $invalids))
                        Mật khẩu xác nhận phải giống mật khẩu phía trên!
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Loại tài khoản:</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <select class="form-control" name="acctype">
                            <option selected value="normal">Người dùng thường</option>
                            <option value="admin">Người quản trị</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Họ và Tên (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="fullname" placeholder="Nhập họ và tên của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ngày sinh (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" onfocus="this.type='date'" class="form-control" required="required" name="birthday" placeholder="Chọn ngày sinh của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Địa chỉ (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="address" placeholder="Nhập địa chỉ của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Số điện thoại (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="phone" placeholder="Nhập số điện thoại của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Email (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="email" class="form-control" required="required" name="email" placeholder="Nhập tên email của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Công việc (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="job" placeholder="Nhập công việc hiện tại của bạn">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Giới thiệu:</b>
                    </div>
                    <div class="col-4" style="margin-right: auto">
                        <textarea style="height: 160px;" type="text" class="form-control" required="required" name="introduction" placeholder="Bạn có thể giới thiệu ngắn về bản thân"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Đăng ký" class="btn btn-primary" style="margin:auto; margin-top:24px">
                </div>
                <div class="row" style="justify-content:center; margin-top:22px">
                    Bạn đã có tài khoản? &nbsp;<a href="/login"><b>Đăng nhập</b></a>
                </div>
            </form>
        </div>
    </div>
    @include("Footer")
</body>

</html>