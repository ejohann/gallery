$(document).ready(function() {

  var user_href;
  var user_href_split;
  var user_id;
  var image_href;
  var image_href_split;
  var image_id;

  $(".modal_thumbnails").click(function(){

    $("#set_user_image").prop('disabled', false);
     
    user_href = $("#user-id-del").prop('href');

    user_href_split = user_href.split("=");

    user_id = user_href_split[user_href_split.length -1];

    image_href = $($this).prop("src");

    image_href_split = image_href.split("/");

    image_id = image_href_split[image_href_split.length -1];

    console.log(image_id);
    
  });




   
   tinymce.init({selector:'textarea'});
});



