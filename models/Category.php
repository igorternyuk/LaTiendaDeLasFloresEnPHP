<?php

/**
 * Description of Category
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Category {
    public static function getAllMainCategories(){
        $db = Db::getConnection();
        $sql = "SELECT * FROM `category` WHERE `parent_id` = 0 AND"
                . " `status` = 1 ORDER by `sort_order` DESC";
        $statement = $db->prepare($sql);
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;        
    }
    
    public static function getAllMainCategoriesWithChildren(){
       $db = Db::getConnection();
        $sql = "SELECT * FROM `category` WHERE `parent_id` = 0 AND"
                . " `status` = 1 ORDER by `sort_order` DESC";
        $statement = $db->prepare($sql);
        if($statement->execute()){
            $allCats = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($allCats as &$category){
                $id = $category['id'];
                $children = self::getChildren($id);
                $category['children'] = $children;
            }
            return $allCats;
        }
        return false;  
    }
    
    public static function getById($categoryId){
        $db = Db::getConnection();
        $sql = "SELECT * FROM `category` WHERE `status` = 1"
                . " AND `id` = :id LIMIT 1";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $categoryId, PDO::PARAM_INT);
        if($statement->execute()){
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    
    public static function checkIfMain($categoryId){
        $sql = "SELECT * FROM `category` WHERE "
                . " `id` = :id ORDER BY `id` DESC LIMIT 1";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $categoryId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            $category = $res[0];
            return $category['parent_id'] == 0;
        }
        return false;
    }


    public static function getChildren($categoryId){
        $sql = "SELECT * FROM `category` WHERE `status` = 1 AND `parent_id` = :id";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $categoryId,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeSelection($sql, $options);
    }
    
    public static function getChildrenIds($categoryId){
        $sql = "SELECT `id` FROM `category` WHERE `status` = 1"
                . " AND `parent_id` = :id";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $categoryId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $ids = [];
        $res = Db::executeSelection($sql, $options);
        if($res){
            foreach ($res as $record){
                array_push($ids, $record['id']);
            }
        }
        return $ids;
    }
    
    public static function getFullName($productId){
        $category = Category::getById($categoryId);
        $name = $category['name'];
        if(!Category::checkIfMain($categoryId)){
            $parent = Category::getById($category['parent_id']);
            $parentName= $parent['name'];
            $name = $parentName . " " . $name;
        }
        return $name;
    }
}
