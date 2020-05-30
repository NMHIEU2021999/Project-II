$('.user-profile').on('click', clickProfile);
function clickProfile(event){
    event.stopPropagation();
    var check= $('.user-profile p.selected');
    if(check.length != 0){
        $('.user-profile p').removeClass('selected');
        $('#profile-extend').hide();
    }else{
        $('.user-profile p').addClass('selected');
        $('#profile-extend').show();
    }    
}
function clickOutSide(){
    var check= $('.user-profile p.selected');
    if(check.length != 0){
        $('.user-profile p').removeClass('selected');
        $('#profile-extend').hide();
    }
}
$(document).on('click', clickOutSide);
