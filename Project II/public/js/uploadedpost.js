$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn-delete').on('click', function(e){
    $.ajax({
        type: "post",
        url: "/api/deletepost",
        data: {postid: $(this).children('#postid').html()},
        dataType: "json",
        success: function (response) {
            window.location.href = "/uploads";
        },
        error: function(){
            alert('đã xảy ra lỗi, vui lòng thử lại sau!');
        }
    });
});