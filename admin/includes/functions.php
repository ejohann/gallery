<?php 

  function class_auto_loader($class)
   {
     $class = strtolower($class);
     $the_path = "includes/{$class}.php";
      
     if(is_file($the_path) && !class_exists($class))
      {
      	require_once($the_path);
      }
   }

 spl_autoload_register('class_auto_loader');


?>