<?php

include_once('dataBase.php');

// Define configuration
//define("DB_HOST", "localhost");
//define("DB_USER", "postgres");
//define("DB_PASS", "1234");
//define("DB_NAME", "camaron");
// credenciales base de datos web



define("DB_HOST", "ec2-54-227-243-210.compute-1.amazonaws.com");
define("DB_USER", "apxqfsaxnvgzic");
define("DB_PASS", "8083764562884e01c15282ea6c5c1274e754a0d8dff6d8d2b0af63504d3be430");
define("DB_NAME", "dh9sa2bsn68st");

class Collector extends dataBase
{
  public static $db;
  private $host      = DB_HOST;
  private $username  = DB_USER;
  private $password  = DB_PASS;
  private $dbname    = DB_NAME;
    
  public function __construct()
  {
    self::$db = new dataBase($this->username, $this->password, $this->host, $this->dbname);
  }

}
?>
