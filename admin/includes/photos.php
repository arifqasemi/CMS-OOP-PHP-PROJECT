<?php



class Photos extends Db_obj{

    protected static $db ="fotos ";
    protected static $db_table_fields =array('id','title','description','filename','type','size','alternate','caption');
    public $id;
    public $title;
    public $description;
    public $type;
    public $filename;
    public $size;
    public $alternate_text;
    public $caption;
    public $tmp_path;
    public $user_id;

    public $directory = "image";
    public $cutom_errors = array();
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


    public function set_file($file){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->error)){
                return false;
            }

        if(empty($file) || !$file || !is_array($file)){
            $this->error []= "The file was not available.";
            return false;
        }elseif($file['error'] !=0){
         
            $this->error = $this->upload_errors[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
    
        }
    }
    }


    public function picture_path(){

        return ('../admin/image/'.$this->filename);
    }

    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->error)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmp_path)){
                $this->error []= "The file name and temp_path  is not available.";
                return false;
        }
        $target_path = SITE_ROOT. DS .'admin'.DS.$this->directory.DS.$this->filename;

        if(file_exists($target_path)){
            $this->error[] = "The file {$this->filename} already exists";
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
public function delete_photo(){
    if($this->delete()){
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->directory . DS . $this->filename;
      return unlink($target_path)?true :false;
    }
}


   public static function display_sidebar_details($photo_id){
    global $database;
    $photo_id = $database->escape_string($photo_id);
    $photo = Photos::get_by_id($photo_id);


    $result = "<a><img src='{$photo->picture_path()}'></a>";
    $result .= "<p>Name:{$photo->filename}</p>";
    $result .= "<p>Size:{$photo->size}</p>";
    $result .= "<p>Type:{$photo->type}</p>";
    echo $result;


   }
}