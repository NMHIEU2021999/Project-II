$('#newpassword').on('change', function(e){
    var val = $('#newpassword').val();
    if(val!=''){
        $('#passwordid').attr('required', 'required');
    }else{
        $('#passwordid').removeAttr('required');
    }
});
$('.cancel').on('click', function(e){
    window.location.href = "/";
});