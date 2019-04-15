<?php

/**
 * Description of Product
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Product {
    
    const SHOW_BY_DEFAULT = 3;
    
    public static function getById($productId){
        $sql = "SELECT * FROM `product` WHERE `id` = :id LIMIT 1";
        $params = [
            [
                'placeholder' => ':id',
                'value' => $productId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $params);
        if($res && is_array($res)){
            return $res[0];
        }
        return false;
    }
    
    public static function countAllAvailable($letter = null){
        $sql = "SELECT COUNT(`id`) AS total FROM `product` WHERE `available` = 1 ";
        $params = [];
        if($letter != null){
            $sql .= " AND `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => $letter.'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $res = Db::executeSelection($sql, $params);        
        return $res ? $res[0]['total'] : 0;
    }
    
    public static function getLatest(int $page = 1, $letter = null){
        //Utils::debug($letter);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $sql = "SELECT * FROM `product` WHERE `available` = 1 ";
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
        if($letter != null){
            $sql .= " AND `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => lcfirst($letter).'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $sql .= " ORDER BY `id` DESC LIMIT :limit OFFSET :offset";
        //Utils::debug($offset);
        
       return Db::executeSelection($sql, $params);
    }
    
    public static function countByCategoryId($categoryId, $letter = null){
        $ids = [$categoryId];
        if(Category::checkIfMain($categoryId)){
            $childrenIds = Category::getChildrenIds($categoryId);
            if(is_array($childrenIds)){
                $ids = $childrenIds;
            }
        }
        //Utils::debug($ids);
        $ids = implode(",", $ids);
        
        $sql = "SELECT COUNT(`id`) AS total FROM `product` WHERE"
                . " `available` = 1 AND FIND_IN_SET(`category_id`, :ids) ";
        //Utils::debug($sql);
        $params = [
            [
                'placeholder' => ':ids',
                'value' => $ids,
                'type' => PDO::PARAM_STR
            ]
        ];
        if($letter != null){
            $sql .= " AND `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => lcfirst($letter).'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        
       $res = Db::executeSelection($sql, $params);
       
       return intval($res ? $res[0]['total'] : 0);
    }
    
    public static function getByCategoryId($categoryId, $page = 1,
            $letter = null){
        $ids = [$categoryId];
        if(Category::checkIfMain($categoryId)){
            $childrenIds = Category::getChildrenIds($categoryId);
            if(is_array($childrenIds)){
                $ids = $childrenIds;
            }
        }
        //Utils::debug($ids);
        $ids = implode(",", $ids);
        //Utils::debug($ids);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $sql = "SELECT * FROM `product` WHERE `available` = 1"
                . " AND FIND_IN_SET(`category_id`, :ids) ";
        $params = [
            [
                'placeholder' => ':ids',
                'value' => $ids,
                'type' => PDO::PARAM_STR
            ],
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
        if($letter != null){
            $sql .= " AND `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => lcfirst($letter).'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $sql .= " ORDER BY `id` DESC LIMIT :limit OFFSET :offset";
        //Utils::debug($sql);
        
       return Db::executeSelection($sql, $params);
    }
    
    public static function getAllRecommended(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `is_recommended` = 1 ORDER BY `id` DESC LIMIT 6";
        return Db::executeSelection($sql);
    }
    
    public static function getAllNew(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `is_new` = 1 ORDER BY `id` DESC LIMIT 6";
        return Db::executeSelection($sql);
    }
    
    public static function getAllWithDiscount(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `discount` = 1 ORDER BY `id` DESC LIMIT 6";
        return Db::executeSelection($sql);
    }
    
    public static function getStock($productId){
        $sql = "SELECT `stock` AS stock FROM `product` WHERE `id` = :product_id";
        $params = [
            [
                'placeholder' => ':product_id',
                'value' => $productId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $params);
        if($res){
            return $res[0]['stock'];
        }
        return 0;
    }
    
    public static function updateStock($productId, $newStock){
        $sql = "UPDATE `product` SET `stock` = :stock WHERE `id` = :id LIMIT 1";
        $params = [
            [
                'placeholder' => ':stock',
                'value' => $newStock,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':id',
                'value' => $productId,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeUpdate($sql, $params);
    }
    
    public static function getImage($productId){
        $product = self::getById($productId);
        if(!$product || !$product['image_big']){
            return PathToProductImages.NoImage;
        }
        $pathToImage = ROOT.PathToProductImages.$product['image_big'];
        //echo $pathToImage;
        if(file_exists($pathToImage)){
            return PathToProductImages.$product['image_big'];
        } else {
            return PathToProductImages.NoImage;
        }
    }
 
}
