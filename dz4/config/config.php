<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 20.08.2016
 * Time: 1:29
 */
//
//define('HOST', 'localhost');
//define('USER', 'root');
//define('PASS', '');
//define('DB', 'gbook');

class DB_mysqli{
    public $user;
    public $pass;
    public $dbhost;
    public $dbname;
    public $dbh;

    static function checkAuth(){
        if(empty($_SESSION)) return false;
    }

    public function __construct($dbhost, $user, $pass, $dbname){
        $this->dbhost = $dbhost;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    function connect(){
        $this->dbh = mysqli_connect($this->dbhost, $this->user, $this->pass, $this->dbname)  or die("Error ".mysqli_error($this->dbh));
        return $this->dbh;
    }
}

$link = new DB_mysqli('localhost', '', 'root', 'gbook');
$CONNECT = $link->connect();
var_dump($CONNECT);
if(!$CONNECT){
    echo "Нет подключения<br>";
} else {
    echo "Base OK!";
}