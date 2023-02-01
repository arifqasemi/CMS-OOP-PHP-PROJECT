<?php


class User extends Db_obj{

    protected static $db ="users";
    protected static $db_table_fields =array('username','password','firstname','lastname','name','user_image');
    public $id;
    public $name;
    public $lastname;
    public $firstname;
    public $password;
    public $username;
    public $user_image;
    public $tmp_path;
    public $type;
    public $directory = "image";
    public $placeholder = "https://loremflickr.com/320/240";
    public $upload_errors = array(

        UPLOAD_ERR_OK => "There is no error, the file uploaded with success.",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Cannot write to target directory. Please fix CHMOD.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    );



    public function set_image($file){
      
      
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->error)){
                return false;
            }
        if(empty($file) || !$file || !is_array($file)){
            $this->error []= "The file was not available.";
            return false;
        }elseif($file['error'] !==0){
         
            $this->error = $this->upload_errors[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
    
        }
    }
    }

    public function image_path_placeholder(){
        return('../admin/image/'.$this->user_image);

        // return('../admin/image/'.$this->user_image);
        // return empty($this->user_image)? $this->placeholder : $this->directory.DS.$this->user_image;
        
    }

    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password =  $database->escape_string($password);

        $sqli = "select * from " . static::$db . " where username='$username' AND password='$password'";
        $query_result = static::find_this_query($sqli);
        return !empty($query_result)? array_shift($query_result):false;



    }

    
    public function save_user_image(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->error)){
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->error []= "The file name and temp_path  is not available.";
                return false;
        }
        $target_path = SITE_ROOT. DS .'admin'.DS.$this->directory.DS.$this->user_image;

        if(file_exists($target_path)){
            $this->error[] = "The file {$this->user_image} already exists";
            return false;
        }
        if(move_uploaded_file($this->tmp_path,$target_path)){
            if($this->create()){
                unset($this->tmp_path);
                return true;
            }
        }else{
            $this->error[] = "the file directory probably does not have permission";
            return false;
        }
        // $this->create();
    }

    }


     public function ajax_save_user_image($user_image,$user_id){
        
        global $database;
        $user_image = $database->escape_string($user_image);
        $user_id = $database->escape_string($user_id);
        $this->user_image = $user_image;
        $this->id = $user_id;

        $sqli = "UPDATE ".self::$db." set user_image='{$this->user_image}' ";
        $sqli .= " WHERE id= " .$this->id;
        $upload_user_image = $database->query($sqli);

         echo $this->image_path_placeholder();
        

}


public function delete_user_photo(){
    if($this->delete()){
        // $target_path = SITE_ROOT . DS . 'admin' . DS . $this->directory . DS . $this->user_image;
      return unlink('../admin/image/'.$this->user_image) ? true :false;
    //   return unlink($target_path)?true :false;

    }
}
   
}



