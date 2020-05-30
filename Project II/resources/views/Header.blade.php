<script src="./js/jquery-3.4.1.min.js"></script>
<div class="header">
    <div class="Logo">
        <a class="home" href="/">
        <p class="logo-name"><i class="fas fa-home"></i>&nbsp;Trọ Đẹp</p>
        </a>
    </div>
    <?php
    use Illuminate\Support\Facades\Auth;

    if (Auth::check()) {
        $user = Auth::user();
    }
    ?>
    <div class="user-navigation">
        @if(isset($user))
        <a class="wishlist" href="/wishlist">
            <p>Quan tâm</p>
        </a>
        <div class="seperator"></div>
        <a class="uploaded" href="/uploaded">
            <p>Đã đăng</p>
        </a>
        <div class="seperator"></div>
        <a class="upload-post" href="/uploadpost">
            <p>Đăng tin</p>
        </a>
        @if($user->acctype=='admin')
        <div class="seperator"></div>
        <a class="report" href="/report">
            <p>Báo cáo</p>
        </a>
        @endif
        @endif
    </div>
    <div class="User">
        @if(!isset($user))
        <a class="login" href="login">
            <p>Đăng nhập</p>
        </a>
        <div class="seperator"></div>
        <a class="register" href="register">
            <p>Đăng ký</p>
        </a>
        @else
        <div class="user-profile" style="display: non">
            <p><i class="fa fa-user" style="font-size: 24px"></i>&nbsp; {{$user->username}}</p>
        </div>
        <div id="profile-extend"  style="display: none">
            <a class="view-profile" href="/profile?username=<?php echo $user->username?>">
                <p><i class="fas fa-user-check"></i>&nbsp; Hồ sơ</p>
            </a>
            <a class="edit-profile" href="/editprofile">
                <p><i class="fas fa-user-edit"></i>&nbsp; Cập nhật</p>
            </a>
            <a class="logout" href="/logout">
                <p><i class="fas fa-sign-out-alt"></i>&nbsp; Đăng xuất</p>
            </a>
        </div>
        @endif
    </div>
    <script src="./js/header.js"></script>
</div>