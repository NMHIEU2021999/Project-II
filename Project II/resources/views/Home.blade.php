<html>

<head>
<meta charset="UTF-8">
    <title>Trọ đẹp - Chi tiết bài đăng</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/detailpost.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <div class="content-container container-fluid">
        <div class="search-bar">
            <p class="search-bar-header"><b>Tìm kiếm theo:</b></p>
            <form method="get">
                <div class="row">
                    <div class="select-box">
                        <div class="select-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <select class="select form-control" name="province">
                            <option hidden disabled selected>Tỉnh/Thành</option>
                            <option <?php if(isset($province)&&($province == 'Hà Nội')) echo 'selected'?>>Hà Nội</option>
                            <option <?php if(isset($province)&&($province == 'Hồ Chí Minh')) echo 'selected'?>>Hồ Chí Minh</option>
                            <option <?php if(isset($province)&&($province == 'Đà Nẵng')) echo 'selected'?>>Đà Nẵng</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <div class="select-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <select class="select form-control" name="price">
                            <option hidden disabled selected>Giá tiền</option>
                            <option value="1" <?php if(isset($price)&&($price == 1)) echo 'selected'?>>Dưới 1.000.000</option>
                            <option value="2" <?php if(isset($price)&&($price == 2)) echo 'selected'?>>Từ 1.000.000 - 1.5000.000</option>
                            <option value="3" <?php if(isset($price)&&($price == 3)) echo 'selected'?>>Từ 1.500.000 - 2.000.000</option>
                            <option value="4" <?php if(isset($price)&&($price == 4)) echo 'selected'?>>Từ 2.000.000 - 3.000.000</option>
                            <option value="5" <?php if(isset($price)&&($price == 5)) echo 'selected'?>>Từ 3.000.000 - 6.000.000</option>
                            <option value="6" <?php if(isset($price)&&($price == 6)) echo 'selected'?>>Trên 6.000.000</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <div class="select-icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <select class="select form-control" name="size">
                            <option hidden disabled selected>Diện tích</option>
                            <option value="1" <?php if(isset($size)&&($size == 1)) echo 'selected'?>>Dưới 10m2</option>
                            <option value="2" <?php if(isset($size)&&($size == 2)) echo 'selected'?>>10 - 20 m2</option>
                            <option value="3" <?php if(isset($size)&&($size == 3)) echo 'selected'?>>20 - 30m2</option>
                            <option value="4" <?php if(isset($size)&&($size == 4)) echo 'selected'?>>30 - 60m2</option>
                            <option value="5" <?php if(isset($size)&&($size == 5)) echo 'selected'?>>Trên 60m2</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <div class="select-icon">
                            <i class="fa fa-tag"></i>
                        </div>
                        <select class="select form-control" name="category">
                            <option hidden disabled selected>Loại</option>
                            <option <?php if(isset($category)&&($category == 'Phòng cho thuê')) echo 'selected'?>>Phòng cho thuê</option>
                            <option <?php if(isset($category)&&($category == 'Homestay')) echo 'selected'?>>Homestay</option>
                            <option <?php if(isset($category)&&($category == 'Ở ghép')) echo 'selected'?>>Ở ghép</option>
                            <option <?php if(isset($category)&&($category == 'Nguyên căn')) echo 'selected'?>>Nguyên căn</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <div class="select-icon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        <select class="select form-control" name="order">
                            <option value="1" <?php if(isset($order)&&($order == 1)) echo 'selected'?>>Tin mới trước</option>
                            <option value="2" <?php if(isset($order)&&($order == 2)) echo 'selected'?>>Giá thấp trước</option>
                            <option value="3" <?php if(isset($order)&&($order == 3)) echo 'selected'?>>Giá cao trước</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> &nbsp;Tìm kiếm</button>
                </div>
            </form>
        </div>
        <?php
        $query = '';
        if (isset($province)) {
            $query .= '?province=' . $province;
        }
        if (isset($price)) {
            if (empty($query)) {
                $query .= '?price=' . $price;
            } else {
                $query .= '&price=' . $price;
            }
        }
        if (isset($size)) {
            if (empty($query)) {
                $query .= '?size=' . $size;
            } else {
                $query .= '&size=' . $size;
            }
        }
        if (isset($category)) {
            if (empty($query)) {
                $query .= '?category=' . $category;
            } else {
                $query .= '&category=' . $category;
            }
        }
        if (isset($order)) {
            if (empty($query)) {
                $query .= '?order=' . $order;
            } else {
                $query .= '&order=' . $order;
            }
        }
        if (empty($query)) {
            $query .= '?';
        } else {
            $query .= '&';
        }
        $lastPage = $posts->lastPage();
        $currentPage = $posts->currentPage();
        ?>
        <div class="post-list">
            @foreach($posts as $post)
            <div class="short-post row">
                <a href="/detailpost?postid=<?php echo $post->postid ?>">
                    <img src="<?php echo $post->image1 ?>" alt="Main Image" height="160px" width="215px">
                </a>
                <div class="short-info">
                    <a href="/detailpost?postid=<?php echo $post->postid ?>">
                        <p class="contest-name">{{$post->postname}}</p>
                    </a>
                    <div class="btn-container">
                        <a style="padding-top: 10px; padding-bottom: 10px" href="/detailpost?postid=<?php echo $post->postid ?>" class="btn-detail"><span>Chi tiết</span></a>
                    </div>
                    <p><b>Giá phòng/tháng:</b> <span class="price">{{$post->price}} VNĐ</span></p>
                    <p><b>Diện tích:</b> {{$post->size}} m2</p>
                    <p><b>Địa chỉ:</b> {{$post->address}}</p>
                    <p><b>Loại phòng:</b> {{$post->category}} </p>
                    <p><b>Ngày đăng:</b> {{$post->dateupload}}</p>
                    <p><b>Trạng thái:</b> <span class="<?php if ($post->status == "đã giao") echo "text-warning"; ?>">{{$post->status}}</span></p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="paging" style="position: relative">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item ">
                        <a class="page-link <?php if ($currentPage == 1) echo "disable" ?>" href="/<?php echo $query ?>page=1">
                            &#10094;&#10094;
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link <?php if ($currentPage == 1) echo "disable" ?>" href="/<?php echo $query ?>page=<?php echo $currentPage - 1 ?>">
                            &#10094;
                        </a>
                    </li>
                    @if($currentPage > 2)
                    <li class="page-item">
                        <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage - 2 ?>">{{$currentPage -2}}</a>
                    </li>
                    @endif
                    @if($currentPage > 1)
                    <li class="page-item">
                        <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage - 1 ?>">{{$currentPage -1}}</a>
                    </li>
                    @endif
                    <li class="page-item  active">
                        <a class="page-link">{{$currentPage}}</span></a>
                    </li>
                    @if($currentPage < $lastPage) 
                    <li class="page-item">
                        <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage + 1 ?>">{{$currentPage + 1}}</a>
                    </li>
                    @endif
                    @if($currentPage < $lastPage -1) 
                    <li class="page-item">
                            <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage + 2 ?>">{{$currentPage + 2}}</a>
                    </li>
                    @endif
                    <li class="page-item">
                    <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="/<?php echo $query ?>page=<?php echo $currentPage + 1 ?>"> &#10095;</a>
                    </li>
                    <li class="page-item ">
                        <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="/<?php echo $query ?>page=<?php echo $lastPage?>">&#10095;&#10095;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    @include('Footer')
</body>

</html>