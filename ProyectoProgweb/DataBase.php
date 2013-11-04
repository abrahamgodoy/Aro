<?php


class DataBase{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'user203';

    static private $instance = NULL;
    private $_db;

    static function getInstance()
    {
      if (self::$instance == NULL)
      {
        self::$instance = new DataBase();
        if(mysqli_connect_errno()) {
            throw new Exception("Error de conexion: ".mysqli_connect_error());
        }
      }
      return self::$instance;
    }

    private function __construct()
    {
        $this->_db = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME) or die('Couldnt connect');
    }

    public function query($sql){
        return $this->_db->query($sql);
    }

}

?>