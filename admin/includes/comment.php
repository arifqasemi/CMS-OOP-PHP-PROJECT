<?php


class Comment extends Db_obj{

    protected static $db ="comments ";
    protected static $db_table_fields =array('id','photo_id','author','body');
    public $id;
    public $photo_id;
    public $author;
    public $body;
  



  public static function create_comment($photo_id, $author,$body){
    if(!empty($body) && !empty($photo_id) && !empty($author)){
        $comment = new Comment();
        $comment->author = $author;
        $comment->body = $body;
        $comment->photo_id = (int)$photo_id;
        return $comment;
    }else{
        return false;
    }
  }

  public static function find_the_comment($photo_id=0){
    global $database;
    $sqli = "select * from " . self::$db;
    $sqli.=" WHERE photo_id=" . $database->escape_string($photo_id) ;
    // $sqli.= "ORDER by photo_id ASC";
    return self::find_this_query($sqli);
  }

   
}



