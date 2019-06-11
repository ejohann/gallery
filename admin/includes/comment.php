<?php 


 class Comment extends Db_object
    {
      protected static $db_table = "comments";
      protected static $db_table_fields = array('id','photo_id','author','body');
      public $id;
      public $photo_id;
      public $author;
      public $content;
       

      public static function create_comment($photo_id, $author, $content)
       {
          if(!empty($photo_id) && !empty($author) && !empty($content))
          	 {
                $comment = new Comment();

                $comment->photo_id = (int)$photo_id;
                $comment->author = $author;
                $comment->content = $content;
               return $comment;
          	 }
          	else
          	{
          		return false;
          	}

       }

     public static function find_the_comments($photo_id)
      {
      	  global $database;
      	  $photo_id = $database->escape($photo_id);
          $select_comment = "SELECT * FROM " .self::$db_table. "WHERE photo_id = " .$photo_id. " ORDER BY photo_id ASC";
          return self::run_this_query($select_comment);
      }


    }


?>