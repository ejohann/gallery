<?php 

  defined('DS') ? null : define('DS', '/');
  defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' .DS. 'xampp' .DS. 'htdocs' .DS. 'gallery');
  defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'C:' .DS. 'xampp' .DS. 'htdocs' .DS. 'gallery' .DS. 'admin' .DS. 'includes');

  require_once("" .INCLUDES_PATH. "" .DS. "functions.php");
  require_once("" .INCLUDES_PATH. "" .DS. "database.php");
  require_once("" .INCLUDES_PATH. "" .DS. "db_object.php");
  require_once("" .INCLUDES_PATH. "" .DS. "user.php");
  require_once("" .INCLUDES_PATH. "" .DS. "photo.php");
  require_once("" .INCLUDES_PATH. "" .DS. "comment.php");
  require_once("" .INCLUDES_PATH. "" .DS. "session.php");
  require_once("" .INCLUDES_PATH. "" .DS. "paginate.php");


?>