<?php


spl_autoload_register('autoload');
function autoload($class){
    // $path = "includes/";
    // $file = ".php";
    // $fullpath = $path . $class .$file;
    // require $fullpath;
    $class = strtolower($class);
    $path = "includes/{$class}.php";
    if(file_exists($path)){
        require($path);
    }
    else{
        echo "the file {$class} doesn't exists";
    }


}


function redirect($location){
    header("location:{$location}");
}