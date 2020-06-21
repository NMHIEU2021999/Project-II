$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var status = 'unsend';
$('.btn-report').on('click', function(e){
    status = 'sent';
    $.ajax({
        type: "post",
        url: "/api/reportpost",
        data: {postid: $('#postid').html(), category: $('#category').val(), description: $('#description').val()},
        dataType: "json",
        success: function (response) {
            $('#reportModal').modal('hide');
        },
        error: function(){
            alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
        }
    });
});