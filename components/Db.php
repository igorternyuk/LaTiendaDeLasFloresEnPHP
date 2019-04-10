<?php

/**
 * Description of Db
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Db {
    
    public static function getConnection(){
        $paramsPath = '../config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['db_name']}";
        $db = new PDO($dsn, $params['username'], $params['password']);
        $db->exec("set names utf8");
        return $db;
    }
    
    public static function executeUpdate($sql, $params = []){
        $db = Db::getConnection();
        $statement = $db->prepare($sql);
        foreach($params as $par){
            $statement->bindParam($par['placeholder'], $par['value'], $par['type']);
        }
        
        return $statement->execute();
    }
    
    public static function executeSelection($sql, $params = []){
        $db = Db::getConnection();
        $statement = $db->prepare($sql);
        foreach($params as $par){
            $statement->bindParam($par['placeholder'], $par['value'], $par['type']);
        }
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
