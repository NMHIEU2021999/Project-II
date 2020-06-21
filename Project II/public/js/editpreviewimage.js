function readURL(input, output, index) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(output).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]); // convert to base64 string
      $(output).show();
    }else{
        var oldimg = "#oldimg" + index; 
        if($(oldimg).html() != ''){
            $(output).attr('src', $(oldimg).html());
        }else{
            $(output).hide();
        }
    }
  }
  
$("#image1").change(function() {
    readURL(this, '#img1', 1);
});
$("#image2").change(function() {
    readURL(this, '#img2', 2);
});
$("#image3").change(function() {
    readURL(this, '#img3', 3);
});
$("#image4").change(function() {
    readURL(this, '#img4', 4);
});
$("#image5").change(function() {
    readURL(this, '#img5', 5);
});