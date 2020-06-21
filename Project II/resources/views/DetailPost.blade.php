<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Chi tiết bài đăng</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <?php
            $desParagraphs = explode(PHP_EOL, $post->description);
            $dateupload = date_create($post->dateupload);
            $countImg = 1;
            // $introlines = explode(PHP_EOL, $postuser->introduction);
            if ($post->image2 != '') {
                $countImg++;
            }
            if ($post->image3 != '') {
                $countImg++;
            }
            if ($post->image4 != '') {
                $countImg++;
            }
            if ($post->image5 != '') {
                $countImg++;
            }
            $curImg = 1;
            ?>
            <div class="navigator row">
                <a href="/">HOME &nbsp;&nbsp;</a>
                <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i> &nbsp; Chi tiết phòng
            </div>
            @if(isset($successUpdate))
            <div class="row" style="margin-left: 0;">
                <p class="text-primary" style="margin: auto; margin-top: -32px">Cập nhật bài đăng thành công!</p>
            </div>
            @endif
            <div class="row post-header">
                <p class="post-name"><b>Phòng A</b></p>
                <p class="price">{{number_format($post->price, 0, ',', '.')}} VNĐ</p>
                @if(isset($wish))
                <a title="Loại khỏi danh sách quan tâm" class="wish remove-from-wish-list">
                    <i class="fas fa-star text-primary"></i></a>
                @else
                <a title="Thêm vào danh sách quan tâm" class="wish add-to-wish-list"><i class="far fa-star text-primary"></i></a>
                @endif
                <p id="postid" hidden>{{$post->postid}}</p>
            </div>
            <div class="row">
                <div class="col-7 slideshow-container">
                    <div class="mySlides showing">
                        <div class="numbertext">{{$curImg++}} / {{$countImg}}</div>
                        <img src="<?php echo $post->image1 ?>" style="width:100%">
                    </div>
                    @if($post->image2 != '')
                    <div class="mySlides showing">
                        <div class="numbertext">{{$curImg++}} / {{$countImg}}</div>
                        <img src="<?php echo $post->image2 ?>" style="width:100%">
                    </div>
                    @endif
                    @if($post->image3 != '')
                    <div class="mySlides showing">
                        <div class="numbertext">{{$curImg++}} / {{$countImg}}</div>
                        <img src="<?php echo $post->image3 ?>" style="width:100%">
                    </div>
                    @endif
                    @if($post->image4 != '')
                    <div class="mySlides showing">
                        <div class="numbertext">{{$curImg++}} / {{$countImg}}</div>
                        <img src="<?php echo $post->image4 ?>" style="width:100%">
                    </div>
                    @endif
                    @if($post->image5 != '')
                    <div class="mySlides showing">
                        <div class="numbertext">{{$curImg++}} / {{$countImg}}</div>
                        <img src="<?php echo $post->image5 ?>" style="width:100%">
                    </div>
                    @endif
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
                    <p><b>Diện tích: </b>{{number_format($post->size, 0, ',', '.')}} m2</p>
                    <p><b>Loại phòng: </b>{{$post->category}}</p>
                    <p><b>Mô tả:</b></p>
                    @foreach ($desParagraphs as $para)
                    <p>{{$para}}</p>
                    @endforeach
                    <p><b>Ngày đăng: </b>Ngày {{date_format($dateupload, 'd/m/Y')}}, vào lúc {{date_format($dateupload, 'H:i')}}</p>
                </div>
            </div>
            <div class="row" style="margin-top: 24px; font-size:18px; margin-bottom:28px">
                <div class="poster-info col-7">
                    <hr>
                    <div class="info-header">
                        <b>Thông tin người đăng</b>
                    </div>
                    <p><b>username: </b><a href="/profile?username=<?php echo $postuser->username ?>">{{$postuser->username}}</a></p>
                    <p><b>Họ và tên: </b>{{$postuser->fullname}}</p>
                    <p><b>Số điện thoại: </b><span style="color:blue">{{$postuser->phone}}</span></p>
                    <p><b>Địa chỉ: </b>{{$postuser->address}}</p>
                    <p><b>Email: </b>{{$postuser->email}}</p>
                    <p><b>Công việc: </b>{{$postuser->job}}</p>
                    <!-- <p><b>Giới thiệu: </b></p> -->
                </div>
                <div class="report col-5">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#reportModal"><i class="fas fa-exclamation-circle"></i>&nbsp; Báo tin không hợp lệ</button>
                </div>
                <div class="modal fade" data-backdrop="static" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Báo tin không hợp lệ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-3"><b>Loại vi phạm:</b></div>
                                    <div class="col-9">
                                        <select class="form-control" name="category" id="category">
                                            <option selected>Thông tin không đúng thực tế</option>
                                            <option>Trùng lặp</option>
                                            <option>Lừa đảo</option>
                                            <option>Phòng đã bị thuê</option>
                                            <option>Không liên lạc được</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:18px">
                                    <div class="col-3"><b>Mô tả thêm:</b></div>
                                    <div class="col-9">
                                        <textarea id="description" class="form-control" style="height: 320px;" placeholder="Mô tả thêm về vi phạm"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-report">Báo cáo</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Footer')
    <script src="./js/slides-show.js"></script>
    <script src="./js/wish.js"></script>
    <script src="./js/report.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>