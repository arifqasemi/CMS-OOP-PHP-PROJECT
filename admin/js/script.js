$(document).ready(function() {



  $(".modal_thumbnails").click(function(){
   
  
  $('#set_user_image').prop('disabled',false);



  var user_id;
  var user_href;
  var user_href_splited;

  var image_name;
  var image_src;
  var image_src_splited;

  var photo_id;
 
 user_href = $('#user_id').prop('href');
 
 user_href_splited = user_href.split('=');
 user_id = user_href_splited[user_href_splited.length -1];



 image_src = $(this).prop("src");
 image_src_splited = image_src.split("/");
 image_name = image_src_splited[image_src_splited.length -1];


 
 
 $("#set_user_image").click(function(){




  $.ajax({
    url:"includes/ajax_code.php",
    data:{image_name:image_name, user_id:user_id},
    type:"Post",
    success: function(data){
      if(!data.error){
       $('.user_imag_box a img').prop('src',data)
      }

    }


      
  })





});

photo_id = $(this).attr('data');

$.ajax({
  url:"includes/ajax_code.php",
  data:{photo_id:photo_id},
  type:"Post",
  success: function(data){
    if(!data.error){
     $('#modal_sidebar').html(data);
    }

  }


    
})


  });

  $(".delete-btn").click(function(){

 return confirm('are you sure to delete this?');

  });


    $('#summernote').summernote();
  });


/****************toggle sidebar ************/
$(".info-box-header").click(function(){
 $('.inside').slideToggle('fast');
 $('#toggle').toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");



});







