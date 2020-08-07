 <?php
  session_start();

  $db = new mysqli("localhost","hakeem","2607","lib");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>
