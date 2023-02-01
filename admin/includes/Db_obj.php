<?php



class Db_obj{

    // public $cutom_errors = array();
    protected static $db ="users ";


    public static function get_by_id($id){
        global $database;
        $user_result = static::find_this_query("select * from " . static::$db . " where id=$id");
        $firts_user=!empty( $user_result)?array_shift($user_result): false;
        return $firts_user;
    }

    public static function find_this_query($sql){
        global $database;
        $user_result = $database->query($sql);
        $array_object=array();
        while($row = mysqli_fetch_array($user_result)){
            $array_object[]=static::display($row);

        }
        
        return  $array_object;

    }


    public static function display($result){
        $calling_class = get_called_class();
        $object = new $calling_class;
    
        foreach($result as $attribute =>$value){
            if($object->has_the_object($attribute)){
                $object->$attribute=$value;
            }

        }
       
        return $object;
    }

    public function has_the_object($attribute){
        $object_property = get_object_vars($this);
        return array_key_exists($attribute, $object_property);
    }

    
    public static function get_user(){
        return static::find_this_query("SELECT * FROM " . static::$db . "");
     }

     protected function properties(){
        // return (get_object_vars($this));

        $properties = array();
        foreach(static::$db_table_fields as $db_table_field ){
            if(property_exists($this,$db_table_field)){
                $properties[$db_table_field]=$this->$db_table_field;

            }
        }
        return $properties;
    }


    protected function clean_property(){
        global $database;
        $clean_property = array();
        foreach($this->properties() as $key =>$value){
            $clean_property[$key] = $database->escape_string($value);
        }
        return $clean_property;
    }

   


    public function create(){

        global $database;

        $properties = $this->clean_property();
        $sqli = "INSERT INTO " . static::$db . "(". implode(",", array_keys($properties)).") ";
         $sqli .="Values ('". implode("','", array_values($properties)) ."')";

        if($database->query($sqli)){
            $this->id = $database->inserted_id();
            return true;
        }else{
            return false;
        }


       
    }
    public function update(){
        global $database;
        $properties = $this->clean_property();
        $properties_pairs = array();
        foreach($properties as $key => $value){
            $properties_pairs []="{$key}='{$value}'";
        }
        $sqli = "UPDATE ".static::$db." set ";
        $sqli .= implode(",", $properties_pairs);
        $sqli .= " WHERE id= " .$this->id;

        $database->query($sqli);

        return (mysqli_affected_rows($database->conn) == 1)? true :false;
    }


    public function delete(){
        global $database;
        $sqli = "DELETE FROM ".static::$db." ";
        $sqli .="WHERE id=" .$this->id;
        $sqli .=" LIMIT 1";
        $database->query($sqli);
        return (mysqli_affected_rows($database->conn) == 1)? true :false;
    }


    public function save(){
        return isset($this->id)? $this->update():$this->create();
    }


    public static function count_all(){
        global $database;
        $sqli ="SELECT  COUNT(*) FROM " . static::$db;
        $result = $database->query($sqli);
        $row = mysqli_fetch_array($result);
        return array_shift($row);
    }


    
}