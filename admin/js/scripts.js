$(document).ready(function() {

  var user_href;
  var user_href_split;
  var user_id;
  var image_href;
  var image_href_split;
  var image_name;
  var photo_id;

  $(".modal_thumbnails").click(function(){

    $("#set_user_image").prop('disabled', false);
     
    user_href = $("#user-id-del").prop('href');

    user_href_split = user_href.split("=");

    user_id = user_href_split[user_href_split.length -1];

    image_href = $(this).prop("src");

    image_href_split = image_href.split("/");

    image_name = image_href_split[image_href_split.length -1];

    photo_id = $(this).attr("data");

    $.ajax({
      url: "includes/ajax_code.php",
      data: {photo_id: photo_id},
      type: "POST",
      success:function(data){
      	if(!data.error)
      	{
      		$("#modal_sidebar").html(data);
      	}

      }

    });
    
  });


  $("#set_user_image").click(function(){

     
    $.ajax({

      url: "includes/ajax_code.php",
      data: {image_name:image_name, user_id:user_id},
      type: "POST",
      success: function(data){
        if(!data.error)
        {
        	$(".user_image_box a img").prop('src', data);
        }
      }
    });
    });

   $(".info-box-header").click(function(){

    $(".inside").slideToggle("fast");
    $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");

   });

   tinymce.init({selector:'textarea'});
});



