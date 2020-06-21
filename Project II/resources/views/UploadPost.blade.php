<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Đăng tin</title>
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
    <script type="text/javascript">
        $('.upload-post p').addClass('selected');
        $('a.upload-post').addClass('selected');
    </script>
    <div class="content-container container-fluid">
        <div class="create-form-container">
            <div class="navigator row">
                <a href="/">HOME &nbsp;</a>
                <p style="margin-top:2px; margin-bottom:0; color:#00897B; cursor:default; user-select:none"><i class="fas fa-angle-double-right" style="color: #2196F3;"></i>&nbsp; Đăng tin</p>
            </div>
            <h1 class="create-heading">Vui lòng điền các thông tin để đăng tin mới</h1>
            <form class="create-form" id="create-form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tên bài đăng (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="postname" placeholder="Nhập tên bài đăng">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Địa chỉ (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="address" placeholder="Địa chỉ phòng cho thuê">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Tỉnh/thành (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <select class="form-control" name="province">
                            <option selected>Hà Nội</option>
                            <option>Hồ Chí Minh</option>
                            <option>Đà Nẵng</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Giá phòng/tháng (VNĐ) (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="price" placeholder="Giá phòng/giá nhà">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Diện tích (m2) (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="text" class="form-control" required="required" name="size" placeholder="Diện tích">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                    <b>Loại phòng (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                    <select class="form-control" name="category">
                            <option>Phòng cho thuê</option>
                            <option>Homestay</option>
                            <option>Ở ghép</option>
                            <option>Nguyên căn</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Mô tả (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <textarea style="height: 240px" name="description" class="form-control" required="required" placeholder="Thông tin mô tả thêm về bất động sản"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh đại diện (<i class="fa fa-asterisk require" aria-hidden="true"></i>):</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image1" id="image1" required="required">
                        <img id="img1" alt="1st image" height="240px" style="display: none">
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
                        <img id="img2" alt="2nd image" height="240px" style="display: none">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 3:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image3" id="image3">
                        <img id="img3" alt="3rd image" height="240px" style="display: none">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 4:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image4" id="image4">
                        <img id="img4" alt="4th image" height="240px" style="display: none">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="margin-left: auto">
                        <b>Ảnh 5:</b>
                    </div>
                    <div class="col-5" style="margin-right: auto">
                        <input type="file" name="image5" id="image5">
                        <img id="img5" alt="5th image" height="240px" style="display: none">
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary" style="margin-left:auto; margin-top:24px">
                        <i class="fas fa-check"></i>&nbsp; Đăng tin
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
            window.location.href = "/";
        });
    </script>
    <script src="./js/previewimage.js"></script>
</body>

</html>