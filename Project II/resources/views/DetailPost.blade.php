<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Chi tiết bài đăng</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/detailpost.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <div class="content-container container-fluid">
        <div class="detail-container">
            <div class="navigator row">
                <a href="home.php">HOME &nbsp;&nbsp;</a>
                <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i> &nbsp; Chi tiết phòng
            </div>
            <div class="row post-header">
                <p class="post-name"><b>Phòng A</b></p>
                <p class="price">${{$post->price}}</p>
            </div>
            <div class="row">
                <div class="col-7 slideshow-container">
                    <div class="mySlides showing">
                        <div class="numbertext">1 / 5</div>
                        <img src="<?php echo $post->image1?>" style="width:100%">
                    </div>
                    <div class="mySlides showing">
                        <div class="numbertext">2 / 5</div>
                        <img src="<?php echo $post->image2?>" style="width:100%">
                    </div>
                    <div class="mySlides showing">
                        <div class="numbertext">3 / 5</div>
                        <img src="<?php echo $post->image3?>" style="width:100%">
                    </div>
                    <div class="mySlides showing">
                        <div class="numbertext">4 / 5</div>
                        <img src="<?php echo $post->image4?>" style="width:100%">
                    </div>
                    <div class="mySlides showing">
                        <div class="numbertext">5 / 5</div>
                        <img src="<?php echo $post->image5?>" style="width:100%">
                    </div>
                    <a class="prev" onclick="stopTimeOut();plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="stopTimeOut();plusSlides(1)">&#10095;</a>
                    <div style="text-align:center; user-select: none; margin-top:16px">
                        <span class="dot" onclick="stopTimeOut();currentSlide(1)"></span>
                        <span class="dot" onclick="stopTimeOut();currentSlide(2)"></span>
                        <span class="dot" onclick="stopTimeOut();currentSlide(3)"></span>
                        <span class="dot" onclick="stopTimeOut();currentSlide(4)"></span>
                        <span class="dot" onclick="stopTimeOut();currentSlide(5)"></span>
                    </div>
                </div>
                <div class="col-5 post-info">
                    <p class="postinfo-header">Mô tả</p>
                    <hr>
                    <p><b>Trạng thái: </b><span style="color:#FF6F00;"><b>{{$post->status}}</b></span></p>
                    <p><b>Địa chỉ: </b><i class="fas fa-map-marker-alt"></i> &nbsp;{{$post->address}}</p>
                    <p><b>Tỉnh thành: </b>{{$post->province}}</p>
                    <p><b>Diện tích: </b>{{$post->size}}m2</p>
                    <p><b>Loại phòng: </b>{{$post->category}}</p>
                    <p><b>Mô tả:</b></p>
                    <p>- Ở tối đa 2 người</p>
                    <p>- Điện nước tính theo giá nhà nước</p>
                    <p>- Trong nhà có chỗ để xe thuận tiện</p>
                    <p><b>Ngày đăng: </b>{{$post->dateupload}}</p>
                </div>
            </div>
            <div class="row" style="margin-top: 24px; font-size:18px; margin-bottom:28px">
                <div class="poster-info col-7">
                    <hr>
                    <div class="info-header">
                        <b>Thông tin người đăng</b>
                    </div>
                    <p><b>username: </b>{{$postuser->username}}</p>
                    <p><b>Họ và tên: </b>{{$postuser->fullname}}</p>
                    <p><b>Số điện thoại: </b><span style="color:blue">{{$postuser->phone}}</span></p>
                    <p><b>Địa chỉ: </b>{{$postuser->address}}</p>
                    <p><b>Email: </b>{{$postuser->email}}</p>
                    <p><b>Công việc: </b>{{$postuser->job}}</p>
                    <p><b>Giới thiệu: </b>Chuyên môi giới nhà ở khu vực Hà Nội</p>
                </div>
                <div class="report col-5">
                    <button class="btn btn-warning"><i class="fas fa-exclamation-circle"></i>&nbsp; Báo tin không hợp lệ</button>
                </div>
            </div>
        </div>
    </div>
    @include('Footer')
    <script src="./js/slides-show.js"></script>
</body>

</html>