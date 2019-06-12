$(document).ready(function() {

  var user_href;
  var user_href_split;
  var user_id;

  $(".modal_thumbnails").click(function(){

    $("#set_user_image").prop('disabled', false);
     
    user_href = $("#user-id-del").prop('href');
    
  });




   
   tinymce.init({selector:'textarea'});
});



