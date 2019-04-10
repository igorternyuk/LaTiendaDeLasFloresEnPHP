<?php

/**
 * Description of Product
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Product {
    
    const SHOW_BY_DEFAULT = 6;
    
    public static function getById($productId){
        $sql = "SELECT * FROM `product` WHERE `id` = :id LIMIT 1";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $productId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res && is_array($res)){
            return $res[0];
        }
        return false;
    }
    
    public static function getLatest(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `is_recommended` = 1 ORDER BY `id` DESC LIMIT :lim";
        $options = [
            [
                'placeholder' => ':lim',
                'value' => self::SHOW_BY_DEFAULT,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeSelection($sql, $options);
    }
    
    public static function countByCategoryId($categoryId){
        if(Category::checkIfMain($categoryId)){
            $children = Category::getChildren($categoryId);
            $total = 0;
            foreach($children as $child){
                $total += Product::countOfSubcategory($child['id']);
            }
            return $total;
        } else {
            return self::countOfSubcategory($categoryId);            
        }
    }
    
    public static function countOfSubcategory($categoryId){
        $sql = "SELECT COUNT(`id`) AS total FROM `product`"
                    . " WHERE `category_id` = :category_id";
        $options = [
            [
            'placeholder' => ':category_id',
            'value' => $categoryId,
            'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        //Utils::debug($res);
        return $res ? $res[0]['total'] : 0;
    }
    
    public static function getByCategoryId($categoryId, $page = 1){
        if(Category::checkIfMain($categoryId)){
            $children = Category::getChildren($categoryId);
            
            $total = [];
            foreach($children as $child){
                $products = Product::getBySubcategory($child['id'], $page);
                Utils::debug($products);
                if(is_array($products)){
                    array_merge($total, $products);
                }
            }
            return $total;
        } else {
            return self::getBySubcategory($categoryId, $page);
        }
    }
    
    public static function getBySubcategory($categoryId, $page = 1){
        $sql = "SELECT * FROM `product`"
                . " WHERE `category_id` = :category_id"
                . " OFFSET :offset LIMIT :limit";
        $offset = self::SHOW_BY_DEFAULT * ($page - 1);
        $options = [
            [
            'placeholder' => ':category_id',
            'value' => $categoryId,
            'type' => PDO::PARAM_INT
            ],
            [
            'placeholder' => ':offset',
            'value' => $offset,
            'type' => PDO::PARAM_INT
            ],
            [
            'placeholder' => ':limit',
            'value' => self::SHOW_BY_DEFAULT,
            'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeSelection($sql, $options);
    }
    
    public static function getAllRecommended(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `is_recommended` = 1 ORDER BY `id` DESC LIMIT 5";
        return Db::executeSelection($sql);
    }
    
    public static function getAllNew(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `is_new` = 1 ORDER BY `id` DESC LIMIT 5";
        return Db::executeSelection($sql);
    }
    
    public static function getAllWithDiscount(){
        $sql = "SELECT * FROM `product` WHERE `available` = 1 AND"
                . " `discount` = 1 ORDER BY `id` DESC LIMIT 5";
        return Db::executeSelection($sql);
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
