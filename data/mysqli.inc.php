<?php 

abstract class DATABASE {
    // Query types
	const SELECT =  1;
	const INSERT =  2;
	const UPDATE =  3;
	const DELETE =  4;

}

// Singleton to connect db.
class ConnectDb  {
  // Hold the class instance.
  private static $instance = null;
  private static $conn;
  private static $host = 'localhost:3306';
  private static $user = 'dev';
  private static $pass = 'devsp111';
  private static $db = 'portfolio';

  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
    return self::$instance;
  }
  
  public static function getConnection()
  {
    self::$conn = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
    return self::$conn;
  }

  public static function query($OP, $sql) {
    if ($OP == DATABASE::SELECT || $OP == DATABASE::INSERT) {
      $conn = self::getConnection(); // initiate 
      $result = mysqli_query($conn, $sql);
      $data = array();
      while ($result && $row = $result->fetch_object()) {                
          $data[] = get_object_vars($row);
      } 
      if($result)
        mysqli_free_result($result);
      self::closeConnection();
      return $data;
    } else if ($OP == DATABASE::UPDATE || $OP == DATABASE::DELETE) {
      $conn = self::getConnection(); 
      $result = mysqli_query($conn, $sql);
      self::closeConnection();
      return $result;
    } 
  }

  public static function closeConnection()
  {
    mysqli_close(self::$conn);
  }
}