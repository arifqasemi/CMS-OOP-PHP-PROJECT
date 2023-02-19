<?php include("includes/header.php");
require_once("admin/includes/init.php");
?>
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] :1;
$item_per_page = 12;
$total_item = Photos::count_all();

$pagination = new Pagination($page,$item_per_page,$total_item);
 
$sqli = "SELECT * FROM fotos ";
$sqli .= "LIMIT {$item_per_page} ";
$sqli .= "OFFSET {$pagination->offset()}";

$photos = Photos::find_this_query($sqli);

?>
        <div class="row">
                </div>
            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <div class="thumbnails row">
           <?php foreach($photos as $photo):?>
           
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnails" href="photo.php?photo_id=<?php echo $photo->id;?>">
                        <img class="img-thumbnail" style="height:150px; width:200px; margin:15px;" src="admin/image/<?php echo $photo->filename;?>" alt="">
                    </a>
                </div>
           <?php endforeach;?>
           </div>
            </div>




            <!-- Blog Sidebar Widgets Column -->
          <div class="page text-center">
          <ul class="pagination">
          <?php


                if($pagination->total_page() > 1){

                if($pagination->has_previous()){
                    echo "<li class='page-item'><a class='page-link' href='index.php?page={$pagination->previous()}'>Previous</a></li>";
   
   
                   }
                  
                   for($i=1; $i <= $pagination->total_page(); $i++){
                    if($i==$pagination->current_page){
                        echo" <li class='page-item'><a class='active' style='background:black; color:white;' href='index.php?page={$i}'>{$i}</a></li>";


                    }else{
                    echo" <li><a  href='index.php?page={$i}'>{$i}</a></li>";


                    }
                   }


                   if($pagination->has_next()){
                    echo "<li class='page-item'><a class='page-link' href='index.php?page={$pagination->next()}'>Next</a></li>";
   
   
                   }
               
                }

                
                
                ?>
            



            </ul>
          </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
