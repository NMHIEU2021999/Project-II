<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Hồ sơ cá nhân</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <?php
        use Illuminate\Support\Facades\Auth;
    ?>
    <div class="content-container container-fluid">
        <div class="profile-container">
            <div class="navigator row">
                <a href="/">HOME &nbsp;&nbsp;</a>
                <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i> &nbsp; Hồ sơ cá nhân
            </div>
            @if (isset($user))
            <?php
                $birthday = date_format(date_create($user->birthday), 'd/m/Y');
                $introlines = explode(PHP_EOL, $user->introduction);
                $username = Auth::user()->username;
            ?>
            @if(isset($successUpdate))
                <div class="row" style="margin-left: 0;">
                    <p class="text-primary" style="margin: auto; margin-bottom:24px">Cập nhật thông tin cá nhân thành công!</p>
                </div>
            @endif
            @if ($username == $user->username)
            <div class="row edit-option">
                <a class="btn btn-danger" href="/editprofile">Cập nhật</a>
            </div>
            @endif
            <div class="row">
                <div class="col-3 text-center" style="margin-left: auto;">
                    <img src="./image/user-icon.png" class="mx-auto img-fluid img-circle d-block" alt="avatar" height="220px" width="220px">
                    <h6 style="margin-top: 8px; font-size:24px"><b>{{$user->username}}</b></h6>
                </div>
                <div class="col-7" style="margin-right: auto; padding-top:20px">
                    <div class="tab-pane active" id="profile">
                        <h4 style="cursor: default;"><b>Hồ sơ cá nhân</b></h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><b>Họ và tên:</b></td>
                                    <td>{{$user->fullname}}</td>
                                </tr>
                                <tr>
                                    <td><b>Ngày sinh:</b></td>
                                    <td>{{$birthday}}</td>
                                </tr>
                                <tr>
                                    <td><b>Địa chỉ:</b></td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <td><b>Số điện thoại:</b></td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td><b>Email:</b></td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td><b>Công việc hiện tại:</b></td>
                                    <td>{{$user->job}}</td>
                                </tr>
                                <tr>
                                    <td><b>Loại tài khoản: </b></td>
                                    <td>{{$user->acctype}}</td>
                                </tr>
                                <tr>
                                    <td><b>Giới thiệu ngắn:</b></td>
                                    <td>
                                        <?php
                                            foreach($introlines as $line){
                                                echo $line;
                                                echo '<br/><br/>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <p class="text-danger text-center">Không tìm thấy người dùng này!</p>
            @endif
        </div>
    </div>
    @include('Footer')
</body>

</html>