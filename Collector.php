<?php
    if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:index.php"); 
        }                            
    }else{
        //header("location:index.php");
    }
include_once('dataBase.php');

// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "postgres");
define("DB_PASS", "1234");
define("DB_NAME", "camaron");


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
