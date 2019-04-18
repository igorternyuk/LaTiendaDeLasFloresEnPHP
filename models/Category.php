<?php

/**
 * Description of Category
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Category {
    
    const SHOW_BY_DEFAULT = 6;
    
    public static function addNew($name, $parentId, $sortOrder, $status = 1){
        $sql = "INSERT INTO `category` (`name`, `parent_id`,"
                . " `status`, `sort_order`) VALUES(:name, :parent_id, :status,"
                . " :sort_order)";
        $params = [
            [
                'placeholder' => ':name',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':parent_id',
                'value' => $parentId,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':status',
                'value' => $status,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':sort_order',
                'value' => $sortOrder,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeUpdate($sql, $params);
    }
    
    public static function update($id, $name, $parentId, $sort_order, $status = 1){
        $sql = "UPDATE `category` SET `name` = :name, `parent_id` = :parent_id, "
                . " `status` = :status, `sort_order` = :sort_order"
                . " WHERE `id` = :id LIMIT 1";
        $params = [
            [
                'placeholder' => ':name',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':parent_id',
                'value' => $parentId,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':status',
                'value' => $status,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':sort_order',
                'value' => $sort_order,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeUpdate($sql, $params);
    }
    
    public static function removeById($categoryId){
        $sql = "DELETE FROM `category` WHERE `id` = :id LIMIT 1";
        $params = [
            [
                'placeholder' => ':id',
                'value' => $categoryId,
                'type' => PDO::PARAM_STR
            ]
        ];
        return Db::executeUpdate($sql, $params);
    }
    
    public static function countAll(){
        $sql = "SELECT COUNT(*) AS total FROM `category` "
                . " ORDER by `sort_order` DESC";
        $res = Db::executeSelection($sql);
        if($res){
            return $res[0]['total'];
        }
        return 0;
    }
    
    public static function getForPage($page = 1){
        $sql = "SELECT c.*, p.name AS parent_name FROM `category` AS c"
                . " LEFT JOIN `category` AS p ON c.parent_id = p.id "
                . " ORDER BY `sort_order` DESC LIMIT :limit OFFSET :offset";
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $params = [
            [
                'placeholder' => ':limit',
                'value' => self::SHOW_BY_DEFAULT,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':offset',
                'value' => $offset,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeSelection($sql, $params);
    }
    
    public static function getAllMainCategories(){
        $sql = "SELECT * FROM `category` WHERE `parent_id` = 0 AND"
                . " `status` = 1 ORDER by `sort_order` DESC";
        return Db::executeSelection($sql);       
    }
    
    public static function getAllSubCategories(){
        $sql = "SELECT * FROM `category` WHERE NOT `parent_id` = 0 AND"
                . " `status` = 1 ORDER by `sort_order` DESC";
        return Db::executeSelection($sql);       
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
        $sql = "SELECT * FROM `category` WHERE `status` = 1"
                . " AND `id` = :id LIMIT 1";
        $params = [
            [
                'placeholder' => ':id',
                'value' => $categoryId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $params);
        if($res){
            return $res[0];
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
    
    public static function getFullName($categoryId){
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
