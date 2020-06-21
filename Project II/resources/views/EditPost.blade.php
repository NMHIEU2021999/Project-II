<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Cập nhật bài đăng</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/createpost.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <div class="content-container container-fluid">
        <div class="create-form-container">
            <div class="navigator row">
                <a href="/">HOME &nbsp;</a>
                <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i>&nbsp; Cập nhật bài đăng</p>
            </div>
            <h1 class="create-heading">Vui lòng điền các thông tin bạn muốn cập nhật</h1>
            <form class="create-form" id="create-form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Mật khẩu: (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="password" class="form-control" required="required" name="password" placeholder="Nhập mật khẩu hiện tại">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 error-password" style="margin-left: auto">
                    </div>
                    <div class="col-5 error-password text-danger" style="margin-right: auto">
                    @if(isset($errorPassword))
                        Mật khẩu không chính xác, vui lòng thử lại!
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tên bài đăng (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input value="<?php echo($post->postname)?>" type="text" class="form-control" required="required" name="postname" placeholder="Nhập tên bài đăng">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Trạng thái (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <select class="form-control" name="status">
                            <option <?php if($post->status == 'chưa cho thuê') echo 'selected'?>>chưa cho thuê</option>
                            <option <?php if($post->status == 'đã cho thuê') echo 'selected'?>>đã cho thuê</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Địa chỉ (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input value="<?php echo($post->address)?>"  type="text" class="form-control" required="required" name="address" placeholder="Địa chỉ phòng cho thuê">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tỉnh/thành (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <select class="form-control" name="province">
                            <option <?php if($post->province == 'Hà Nội') echo 'selected'?>>Hà Nội</option>
                            <option <?php if($post->province == 'Hồ Chí Minh') echo 'selected'?>>Hồ Chí Minh</option>
                            <option <?php if($post->province == 'Đà Nẵng') echo 'selected'?>>Đà Nẵng</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Giá phòng/tháng (VNĐ) (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input value="<?php echo($post->price)?>" type="text" class="form-control" required="required" name="price" placeholder="Giá phòng/giá nhà">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Diện tích (m2) (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input value="<?php echo($post->size)?>" type="text" class="form-control" required="required" name="size" placeholder="Diện tích">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                    <b>Loại phòng (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                    <select class="form-control" name="category">
                            <option <?php if($post->category == 'Phòng cho thuê') echo 'selected'?>>Phòng cho thuê</option>
                            <option <?php if($post->category == 'Homestay') echo 'selected'?>>Homestay</option>
                            <option <?php if($post->category == 'Ở ghép') echo 'selected'?>>Ở ghép</option>
                            <option <?php if($post->category == 'Nguyên căn') echo 'selected'?>>Nguyên căn</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Mô tả (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <textarea style="height: 240px" name="description" class="form-control" required="required" placeholder="Thông tin mô tả thêm về bất động sản">{{$post->description}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh đại diện:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image1" id="image1">
                        <p id="oldimg1" hidden>{{$post->image1}}</p>
                        <img src="<?php echo ($post->image1);?>" id="img1" alt="1st image" height="240px"
                        <?php if($post->image1 == '') echo ('style= "display: none;"');?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh phụ:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 2:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image2" id="image2">
                        <p id="oldimg2" hidden>{{$post->image2}}</p>
                        <img  src="<?php echo ($post->image2);?>" id="img2" alt="2nd image" height="240px" 
                        <?php if($post->image2 == '') echo ('style= "display: none;"');?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 3:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image3" id="image3">
                        <p id="oldimg3" hidden>{{$post->image3}}</p>
                        <img  src="<?php echo ($post->image3);?>" id="img3" alt="3rd image" height="240px" 
                        <?php if($post->image3 == '') echo ('style= "display: none;"');?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 4:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image4" id="image4">
                        <p id="oldimg4" hidden>{{$post->image4}}</p>
                        <img  src="<?php echo ($post->image4);?>" id="img4" alt="4th image" height="240px" 
                        <?php if($post->image4 == '') echo ('style= "display: none;"');?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 5:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image5" id="image5">
                        <p id="oldimg5" hidden>{{$post->image5}}</p>
                        <img  src="<?php echo ($post->image5);?>" id="img5" alt="5th image" height="240px" 
                        <?php if($post->image5 == '') echo ('style= "display: none;"');?>>
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
    @include('Footer')
    <script type="text/javascript">
        $('.cancel').on('click', function(e){
            window.location.href = "/uploads";
        });
    </script>
    <script src="./js/editpreviewimage.js"></script>
</body>

</html>