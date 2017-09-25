<?php

  require_once('db_credentials.php');
//szerverhez/adattáblához csatlakozás
  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
/*ez*/    confirm_db_connect();
    return $connection;
  }
/*a kapcsolat megszakítása a munka végén*/
  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }
//prevent mysql injection
  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }
//ellenörzi a kpacsolatot és kiírja a hibát/számát
  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }
//ha hiba van egyszerűen kiírja "Database query failed"
  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>
