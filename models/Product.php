<?php

/**
 * Description of Product
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Product {
    
    const SHOW_BY_DEFAULT = 6;
    
    public static function addNew($params){
      $sql = "INSERT INTO `product` (`category_id`, `name`, `code`, `price`,"
              . " `brand`, `stock`, `is_new`, `discount`,`short_description`,"
              . " `description`, `is_recommended`, `available`)"
              . " VALUES(:category_id, :name, :code, :price, :brand, :stock, :is_new,"
                . ":discount, :short_description, :description, :is_recommended,"
              . " :available)";
        $options = [            
            [
                'placeholder' => ':category_id',
                'value' => $params['category_id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':name',
                'value' => $params['name'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':code',
                'value' => $params['code'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':price',
                'value' => $params['price'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':brand',
                'value' => $params['brand'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':stock',
                'value' => $params['stock'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':is_new',
                'value' => $params['is_new'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':discount',
                'value' => $params['discount'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':short_description',
                'value' => $params['short_description'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':description',
                'value' => $params['description'],
                'type' => PDO::PARAM_STR
            ],
            
            [
                'placeholder' => ':is_recommended',
                'value' => $params['is_recommended'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':available',
                'value' => $params['available'],
                'type' => PDO::PARAM_INT
            ]
        ];
        
        $res = Db::executeUpdate($sql, $options);
        if($res){
            return Db::getLastInsertId();
        }
        return false;
    }
    
    public static function update($params){
        $sql = "UPDATE `order` SET `name` = :name, `category_id` = :category_id,"
                . " `code` = :code, `price` = :price, `stock` = :stock, "
                . " `is_new` = :is_new, `discount` = :discount`,"
                . " short_description` = :short_description,"
                . " `description` = :description,"
                . " `is_recommended` = :is_recommended"
                . " `available` = :available, `image_small` = :image_small,"
                . " `image_big` = :image_big,"
                . " WHERE `id` = :id LIMIT 1";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $params['id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':category_id',
                'value' => $params['category_id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':name',
                'value' => $params['name'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':code',
                'value' => $params['code'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':price',
                'value' => $params['price'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':stock',
                'value' => $params['stock'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':is_new',
                'value' => $params['is_new'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':discount',
                'value' => $params['discount'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':short_description',
                'value' => $params['short_description'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':description',
                'value' => $params['description'],
                'type' => PDO::PARAM_STR
            ],
            
            [
                'placeholder' => ':is_recommended',
                'value' => $params['is_recommended'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':available',
                'value' => $params['available'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':image_small',
                'value' => $params['image'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':image_big',
                'value' => $params['image'],
                'type' => PDO::PARAM_STR
            ]
        ];
        return Db::executeUpdate($sql, $options);
    }
    
    public static function updateImage($productId, $image){
        $sql = "UPDATE `product` SET `image_small` = :image_small,"
                . " `image_big` = :image_big "
                . " WHERE `id` = :id LIMIT 1";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $productId,
                'type' => PDO::PARAM_INT
            ],            
            [
                'placeholder' => ':image_small',
                'value' => $image,
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':image_big',
                'value' => $image,
                'type' => PDO::PARAM_STR
            ]
        ];
        return Db::executeUpdate($sql, $options);
    }
    
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
        $sql = "SELECT p.*,c.name AS category_name FROM `product` AS p"
                . " LEFT JOIN `category` AS c ON p.`category_id` = c.`id`"
                . " WHERE p.`available` = 1 ";
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
            $sql .= " AND p.`name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => lcfirst($letter).'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $sql .= " ORDER BY p.`id` DESC LIMIT :limit OFFSET :offset";
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
    
    public static function countAll($filter = null){
        $sql = "SELECT COUNT(`id`) AS total FROM `product` ";
        $params = [];
        if($filter != null){
            $sql .= " WHERE `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => '%'.$filter.'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $res = Db::executeSelection($sql, $params);        
        return $res ? $res[0]['total'] : 0;
    }
    
    public static function getAll($page = 1, $filter = null){
        $sql = "SELECT * FROM `product` ";
        $offset = ($page - 1) * Product::SHOW_BY_DEFAULT;
        $params = [
            [
                'placeholder' => ':limit',
                'value' => Product::SHOW_BY_DEFAULT,
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':offset',
                'value' => $offset,
                'type' => PDO::PARAM_INT
            ]
        ];
        
        if($filter != null){
            $sql .= " WHERE `name` LIKE :name ";
            array_push($params,
                    [
                        'placeholder' => ':name',
                        'value' => '%'.$filter.'%',
                        'type' => PDO::PARAM_STR
                    ]);
        }
        $sql .= " ORDER BY `id` LIMIT :limit OFFSET :offset ";
        return Db::executeSelection($sql, $params);        
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
