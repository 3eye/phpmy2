<?php

namespace App;

class Db 
    
{
    use Singleton;
    
    protected $dbh;
    public static $mas = [];

    protected function __construct() {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=test; charset=utf8;', 'root', '123');
    }
    
    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute(static::$mas);
        return $res;
    }
    
    public function query($sql, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute(static::$mas);
        if (FALSE !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
