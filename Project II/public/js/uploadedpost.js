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
$(document).on('click', function(e){
    if($('#autocomplete-list div').length){
        closeAllLists();
    } 
 });
 $('#inp').keydown(keyUpSearchBox);
 var t, currentFocus;
 function keyUpSearchBox(e) {
     var listRecomds = $('#autocomplete-list div');
     //arrow Down
     if (e.keyCode == 40) {
         currentFocus++;
         addActive(listRecomds);
         //array UP
     } else if (e.keyCode == 38) {
         currentFocus--;
         addActive(listRecomds);
         // Enter
     } else if (e.keyCode == 13) {
         if (listRecomds.length) {
             listRecomds[currentFocus].click();
         }
         if (currentFocus > -1) {
             if (listRecomds.length) listRecomds[currentFocus].click();
         }
     } else if (e.keyCode != 37 && e.keyCode != 39) {
         if (t) {
             clearTimeout(t);
         }
         t = setTimeout(searchAndDisplay, 500);
     }
 }
 
 function addActive(listRecomds) {
     if (!listRecomds.length) {
         return false;
     }
     removeActive(listRecomds);
     if (currentFocus >= listRecomds.length) currentFocus = 0;
     if (currentFocus < 0) currentFocus = (listRecomds.length - 1);
     $(listRecomds[currentFocus]).addClass("autocomplete-active");
 }
 
 function removeActive(listRecomds) {
     for (var i = 0; i < listRecomds.length; i++) {
         $(listRecomds[i]).removeClass('autocomplete-active');
 
     }
 }
 function closeAllLists() {
     $('.autocomplete-items').remove();
 }
 
 function searchAndDisplay() {
     var searchValue = $('#inp')[0].value;
     if(searchValue == '') {
         closeAllLists();
         return false;
     }
     $.ajax({
         type: "post",
         url: "/api/searchuploadedposts",
         data: { searchValue: searchValue },
         dataType: "json",
         success: function (response) {
             closeAllLists();
             var a, b, i;
             currentFocus = -1;
             a = document.createElement("DIV");
             a.setAttribute("id", "autocomplete-list");
             a.setAttribute("class", "autocomplete-items");
             $('#autocomplete').append(a);
             for (i = 0; i < response.length; i++) {
                 b = document.createElement("DIV");
                 b.innerHTML += response[i];
                 b.innerHTML += "<input type='hidden' value='" + response[i] + "'>";
                 b.getElementsByTagName('input')[0].setAttribute('disabled', 'disabled');
                 $(b).click(function (e) {
                     e.stopPropagation();
                     closeAllLists();
                     $('#inp').val($(this).children('input')[0].value);
 
                 });
                 a.append(b);
             }
         }
     });
 }