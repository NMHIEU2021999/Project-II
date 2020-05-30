<html>

<head>
    <meta charset="UTF-8">
    <title>Race - Danh sách giải đua</title>
    <link rel="shortcut icon" type="image/png" href="./icon/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap4.1.13.min.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/contests.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    @include('Header')
    <script type="text/javascript">
        $('.contests p').addClass('selected');
        $('a.contests').addClass('selected');
    </script>
    <div class="content-container container-fluid">
        <?php
        //dd($contests);
        $lastPage = $contests->lastPage();
        $currentPage = $contests->currentPage();
        ?>
        <div class="contest-list">
            @foreach($contests as $contest)
            <div class="short-post row">
                <a href="detailcontest/?contestid=<?php echo $contest->contestid ?>">
                    <img src="<?php echo $contest->image1 ?>" alt="Main Image" height="128px" width="215px">
                </a>
                <div class="short-info">
                    <a href="detailcontest/?contestid=<?php echo $contest->contestid ?>">
                        <p class="contest-name">{{$contest->contestname}}</p>
                    </a>
                    <div class="btn-container">
                        <a style="padding-top: 10px; padding-bottom: 10px" href="detailcontest/?contestid=<?php echo $contest->contestid ?>" class="btn-join"><span>Chi tiết</span></a>
                    </div>
                    <p><b>Giải thưởng:</b> <span class="prize">{{$contest->prize}} VNĐ</span></p>
                    <p><b>Loại cuộc đua:</b> {{$contest->type}} </p>
                    <p><b>Bắt đầu:</b> {{$contest->begin}}</p>
                    <p><b>Kết thúc:</b> {{$contest->end}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="paging" style="position: relative">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item ">
                        <a class="page-link <?php if ($currentPage == 1) echo "disable" ?>" href="/contests?page=1">
                            &#10094;&#10094;
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link <?php if ($currentPage == 1) echo "disable" ?>" href="/contest?page=<?php echo $currentPage - 1 ?>">
                            &#10094;
                        </a>
                    </li>
                    @if($currentPage > 2)
                    <li class="page-item">
                        <a class="page-link" href="/contest?page=<?php echo $currentPage - 2 ?>">{{$currentPage -2}}</a>
                    </li>
                    @endif
                    @if($currentPage > 1)
                    <li class="page-item">
                        <a class="page-link" href="/contest?page=<?php echo $currentPage - 1 ?>">{{$currentPage -1}}</a>
                    </li>
                    @endif
                    <li class="page-item  active">
                        <a class="page-link">{{$currentPage}}</span></a>
                    </li>
                    @if($currentPage < $lastPage) <li class="page-item">
                        <a class="page-link" href="/contest?page=<?php echo $currentPage + 1 ?>">{{$currentPage + 1}}</a>
                        </li>
                        @endif
                        @if($currentPage < $lastPage -1) <li class="page-item">
                            <a class="page-link" href="/contest?page=<?php echo $currentPage + 2 ?>">{{$currentPage + 2}}</a>
                            </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="/contest?page=<?php echo $currentPage + 1 ?>"> &#10095;</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link <?php if ($currentPage == $lastPage) echo "disable" ?>" href="contests?page=<?php echo $lastPage ?>">&#10095;&#10095;</a>
                            </li>
                </ul>
            </nav>
        </div>
    </div>
    @include('Footer')
</body>

</html>