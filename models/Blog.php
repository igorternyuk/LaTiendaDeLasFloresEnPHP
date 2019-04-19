<?php

/**
 * Description of Blog
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Blog {
    public static function getById($id){
        $sql = "SELECT * FROM `blog` WHERE `id` = :id ORDER BY `id` DESC";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            return $res[0];
        }
        return false;
    }
}
