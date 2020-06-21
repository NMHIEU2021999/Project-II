<html>

<head>
    <meta charset="UTF-8">
    <title>Trọ đẹp - Danh sách bài đăng quan tâm</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/wishlist.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <script type="text/javascript">
        $('.wishlist p').addClass('selected');
        $('a.wishlist').addClass('selected');
    </script>
    <div class="content-container container-fluid">
    <div class="search-bar">
            <p class="search-bar-header" style="margin-left: 16px;"><b>Tìm kiếm bài đăng:</b></p>
            <form method="get">
                <div class="row">
                    <div class="col-8 autocomplete" id="autocomplete">
                        <input value="<?php if(isset($search)) echo $search;?>" id="inp" autocomplete="off" type="text" name="search" placeholder="Nhập tên bài đăng" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary text-search" type="submit"><i class="fas fa-search"></i> &nbsp;Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $query = 'wishlist?';
        if(isset($search)){
            $query .='search='.$search.'&';
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
                    <div class="wish-option">
                        <a title="Loại khỏi danh sách quan tâm" class="wish remove-from-wish-list">
                            <i class="fas fa-star text-primary"></i>
                        </a>
                        <p id="postid" hidden>{{$post->postid}}</p>
                    </div>
                    <div class="btn-container">
                        <a style="padding-top: 10px; padding-bottom: 10px" href="/detailpost?postid=<?php echo $post->postid ?>" class="btn-detail"><span>Chi tiết</span></a>
                    </div>
                    <?php
                    $dateupload = date_create($post->dateupload);
                    ?>
                    <p><b>Giá phòng/tháng:</b> <span class="price">{{number_format($post->price, 0, ',', '.')}} VNĐ</span></p>
                    <p><b>Diện tích:</b> {{number_format($post->size, 0, ',', '.')}} m2</p>
                    <p><b>Địa chỉ:</b> {{$post->address}}</p>
                    <p><b>Loại phòng:</b> {{$post->category}} </p>
                    <p><b>Ngày đăng:</b> Ngày {{date_format($dateupload, 'd/m/Y')}}, vào lúc {{date_format($dateupload, 'H:i')}}</p>
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
                    @if($currentPage < $lastPage) <li class="page-item">
                        <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage + 1 ?>">{{$currentPage + 1}}</a>
                        </li>
                        @endif
                        @if($currentPage < $lastPage -1) <li class="page-item">
                            <a class="page-link" href="/<?php echo $query ?>page=<?php echo $currentPage + 2 ?>">{{$currentPage + 2}}</a>
                            </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="/<?php echo $query ?>page=<?php echo $currentPage + 1 ?>"> &#10095;</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="/<?php echo $query ?>page=<?php echo $lastPage ?>">&#10095;&#10095;</a>
                            </li>
                </ul>
            </nav>
        </div>
    </div>
    @include('Footer')
    <script src="./js/uploadedpost.js"></script>
    <script src="./js/wish.js"></script>
    <script src="./js/wishlist.js"></script>
</body>

</html>