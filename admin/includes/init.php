<?php 

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' .DS. 'xampp' .DS. 'htdocs' .DS. 'gallery');
  defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'C:' .DS. 'xampp' .DS. 'htdocs' .DS. 'gallery' .DS. 'admin' .DS. 'includes');

  require_once("functions.php");
  require_once("database.php");
  require_once("db_object.php");
  require_once("user.php");
  require_once("photo.php");
  require_once("photo.php");
  require_once("session.php");


?>