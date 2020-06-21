$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.wish').on('click', function(e){
    if(this.classList[1] === 'add-to-wish-list'){
        addToWishList(this);
    }else if(this.classList[1] === 'remove-from-wish-list'){
        removeFromWishList(this);
    }
});
function addToWishList(button){
    $(button).addClass('remove-from-wish-list');
    $(button).removeClass('add-to-wish-list');
    $(button).html('<i class="fas fa-star text-primary"></i>');
    $(button).attr('title', 'Loại khỏi danh sách quan tâm');
    $.ajax({
        type: "post",
        url: "/api/addtowishlist",
        data: {postid: $(button).parent().children("#postid").html()},
        dataType: "json",
        success: function (response) {
            return;
        },
        error: function(e){
            $(button).addClass('add-to-wish-list');
            $(button).removeClass('remove-from-wish-list');
            $(button).html('<i class="far fa-star text-primary"></i>');
            $(button).attr('title', 'Thêm vào danh sách quan tâm');
            alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
        }
    });
}
function removeFromWishList(button){
    $(button).addClass('add-to-wish-list');
    $(button).removeClass('remove-from-wish-list');
    $(button).html('<i class="far fa-star text-primary"></i>');
    $(button).attr('title', 'Thêm vào danh sách quan tâm');
    $.ajax({
        type: "post",
        url: "/api/removefromwishlist",
        data: {postid: $(button).parent().children("#postid").html()},
        dataType: "json",
        success: function (response) {
            return;
        },
        error: function(e){
            $(button).addClass('remove-from-wish-list');
            $(button).removeClass('add-to-wish-list');
            $(button).html('<i class="fas fa-star text-primary"></i>');
            $(button).attr('title', 'Loại khỏi danh sách quan tâm');
            alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
        }
    });
}