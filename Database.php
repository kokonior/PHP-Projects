<?php

  class Database
  {
      
    private $mysqli;
    private $HOST = 'localhost';
    private $USER = 'username';
    private $PASS = 'password';
    private $DBNAME = 'database_name';
    private static $INSTANCE = null;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if(mysqli_connect_error() ) die ("Connection Fail");
    }

    // singleton pattern
    public static function GetInstance()
    {
        if(!isset(self::$INSTANCE)) self::$INSTANCE = new Database();
        return self::$INSTANCE;
    }

    public function Insert($table, $fields = array())
    {
        $collum = implode(", ", array_keys($fields)); 

        $valuesArray = array();
        $i = 0;
        foreach($fields as $key => $values)
        {
            if(is_int($values)) $valuesArray[$i] = $values;
            else $valuesArray[$i] = "'".$values."'";
            $i++;
        }

        $values = implode(", ", $valuesArray); 

        $query = "INSERT INTO $table ($collum) VALUES ($values)";

        if ($this->mysqli->query($query)) return true;
        else return false;
    }

  }

?>