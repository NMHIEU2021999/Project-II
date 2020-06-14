<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Cập nhật thông tin</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <?php
     use Illuminate\Support\Facades\Auth;
     $user = Auth::user();
     $birthday = date_create($user->birthday);
     ?>
     <div class="content-container container-fluid">
         <div class="register-form-container">
             <div class="navigator row">
                 <a href="/">HOME &nbsp;</a>
                 <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i>&nbsp; Cập nhật thông tin</p>
             </div>
             <h1 class="register-heading">Điền thông tin bạn muốn cập nhật</h1>
             <form class="register-form" method="post" accept-charset="UTF-8" action="/editprofile">
                 @csrf
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Mật khẩu hiện tại (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input type="password" class="form-control" required="required" name="oldpassword" placeholder="Nhập mật khẩu hiện tại">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2 failed-register" style="margin-left: auto">
                     </div>
                     <div class="col-4 register-failed" style="margin-right: auto">
                         @if(isset($errorOldPassword))
                         Mật khẩu không chính xác, vui lòng thử lại!
                         @endif
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Mật khẩu mới: </b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input id="newpassword" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Xác nhận mật khẩu: </b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input id="passwordid" type="password" class="form-control"  name="passwordId" placeholder="Xác nhận lại mật khẩu mới">
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
                             <option selected  value="normal" <?php if($user->acctype == 'normal') echo 'selected'?>>Người dùng thường</option>
                             <option value="admin" <?php if($user->acctype == 'admin') echo 'selected'?>>Người quản trị</option>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Họ và Tên (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo $user->fullname?>" type="text" class="form-control" required="required" name="fullname" placeholder="Nhập họ và tên của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Ngày sinh (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo date_format($birthday, 'd/m/Y')?>" type="text" onfocus="this.type='date'" class="form-control" required="required" name="birthday" placeholder="Chọn ngày sinh của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Địa chỉ (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo $user->address?>" type="text" class="form-control" required="required" name="address" placeholder="Nhập địa chỉ của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Số điện thoại (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo $user->phone?>" type="text" class="form-control" required="required" name="phone" placeholder="Nhập số điện thoại của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Email (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo $user->email?>" type="email" class="form-control" required="required" name="email" placeholder="Nhập tên email của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Công việc (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <input value="<?php echo $user->job?>" type="text" class="form-control" required="required" name="job" placeholder="Nhập công việc hiện tại của bạn">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-2" style="margin-left: auto">
                         <b>Giới thiệu:</b>
                     </div>
                     <div class="col-4" style="margin-right: auto">
                         <textarea  style="height: 160px;" type="text" class="form-control" required="required" name="introduction" placeholder="Bạn có thể giới thiệu ngắn về bản thân">{{$user->introduction}}</textarea>
                     </div>
                 </div>
                 <div class="row">
                     <button type="submit" class="btn btn-primary" style="margin-left:auto; margin-top:24px">
                         <i class="fas fa-check"></i>&nbsp; Cập nhật
                     </button>
                     <button type="button" class="btn btn-danger cancel" style="margin-top: 24px; margin-right:auto; margin-left:12px">
                         <i class="fas fa-times" style="font-size: 18px"></i> &nbsp;&nbsp;Huỷ
                     </button>
                 </div>
             </form>
         </div>
     </div>
    @include("Footer")
    <script src="./js/updateprofile.js"></script>
</body>

</html>