<?php

/**
 * Description of Order
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Order {
    
    const SHOW_BY_DEFAULT = 3;
    
    public static function saveNew($params){
      $sql = "INSERT INTO `order` (`user_id`, `user_ip`,"
                . " `date_created`, `date_updated`, `comment`,"
              . " `total`, `username`, `userphone`, `useraddress`, `status`)"
              . " VALUES(:user_id, :user_ip, NOW(), NOW(), :comment,"
                . ":total, :username, :userphone, :useraddress, 0)";
        //Utils::debug($params);
        $options = [            
            [
                'placeholder' => ':user_id',
                'value' => $params['user_id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':user_ip',
                'value' => $params['user_ip'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':comment',
                'value' => $params['comment'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':total',
                'value' => $params['total'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':username',
                'value' => $params['username'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':userphone',
                'value' => $params['userphone'],
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':useraddress',
                'value' => $params['useraddress'],
                'type' => PDO::PARAM_STR
            ]
        ];
        
        $orderInserted =  Db::executeUpdate($sql, $options);
        //Utils::debug($orderInserted);
        $orderItemsSaved = true;
        $productStocksUpdated = true;
        if($orderInserted){
            $lastInsertId = Db::getLastInsertId();
            $productsInCart = Cart::getProducts();
            foreach ($productsInCart as $product){
                $options = [
                    'order_id' => $lastInsertId,
                    'product_id' => $product['id'],
                    'count' => $product['count'],
                    'subtotal' => $product['subtotal']
                ];
                
                if(OrderItem::createNew($options)){
                    $oldStock = Product::getStock($product['id']);
                    $newStock = $oldStock - $product['count'];
                    if(!Product::updateStock($product['id'], $newStock)){
                        $productStocksUpdated = false;
                        break;
                    }
                } else {
                    $orderItemsSaved = false;
                    break;
                }
                
            }
        }
        
        return $orderInserted && $orderItemsSaved && $productStocksUpdated;
    }
    
    public static function update($params){
        $sql = "UPDATE `order` SET `date_updated` = NOW(),"
                . "`date_payment = :date_payment, `status` = :status"
                . " WHERE user_id = :user_id LIMIT 1";
        $options = [            
            [
                'placeholder' => ':date_payment',
                'value' => $params['date_payment'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':status',
                'value' => $params['status'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':user_id',
                'value' => $params['user_id'],
                'type' => PDO::PARAM_INT
            ]                
        ];
        return Db::executeUpdate($sql, $options);
    }
    
    public static function getAll(){
        $sql = "SELECT * FROM `order` ORDER BY `id` DESC";
        return Db::executeSelection($sql);
    }
    
    public static function countAll(){
        $sql = "SELECT COUNT(`id`) AS total FROM `order`";
        $res = Db::executeSelection($sql);
        if($res){
            return $res[0]['total'];
        }
        return 0;
    }
    
    public static function getForPage($page = 1){
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $sql = "SELECT * FROM `order` ORDER BY `id` DESC"
                . " LIMIT :limit OFFSET :offset";
        $options = [
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
        return Db::executeSelection($sql, $options);
    }
    
    public static function getById($orderId){
        $sql = "SELECT * FROM `order` WHERE `id` = :id ORDER BY `id` DESC";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $orderId,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeSelection($sql, $options);
    }
    
    public static function countByUserId($userId){
        $sql = "SELECT COUNT(*) AS TOTAL FROM `order` WHERE"
                . " `user_id` = :user_id";
        $options = [
            [
                'placeholder' => ':user_id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            return $res[0]['total'];
        }
        return 0;
    }
    
    public static function getByUserId($userId, $page= 1){
        $sql = "SELECT * FROM `order` WHERE"
                . " `user_id` = :user_id ORDER BY `id` DESC"
                . " LIMIT :limit OFFSET :offset ";
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $options = [
            [
                'placeholder' => ':user_id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
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
        return Db::executeSelection($sql, $options);
    }
    
    public static function removeById($id){
        $sql = "DELETE FROM `order` WHERE `id` = :id LIMIT 1";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            ]
        ];
        return Db::executeUpdate($sql, $options);
    }
}

/*
    
    public static function update($options){
        $db = Db::getConnection();
        $query = "UPDATE `order` SET `date_payment` = :date_payment,"
                . " `username` = :username, `userphone` = :userphone,"
                . " `comment` = :comment, `status` = :status"
                . " WHERE `id` = :id LIMIT 1";
        $statment = $db->prepare($query);
        $statment->bindParam(':date_payment', $options['date_payment']);
        $statment->bindParam(':username', $options['username']);
        $statment->bindParam(':userphone', $options['userphone']);
        $statment->bindParam(':comment', $options['comment']);
        $statment->bindParam(':status', $options['status']);
        $statment->bindParam(':id', $options['id']);
        return $statment->execute();
    }
    
    public static function getAll(){
       $db = Db::getConnection();
       $query = "SELECT * FROM `order`"; 
       $statement = $db->prepare($query);
       if($statement->execute()){
           return $statement->fetchAll(PDO::FETCH_ASSOC);
       }
       return false;
    }
    
    public static function getById($orderId){
        $db = Db::getConnection();
        $query = "SELECT * FROM `order` WHERE `id` = :id LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $orderId);
        if($statement->execute()){
           return $statement->fetch(PDO::FETCH_ASSOC);
       }
       return false;
    }
    
    public static function getForPage($page = 1){
       $db = Db::getConnection();
       $query = "SELECT * FROM `order` ORDER BY `id` DESC LIMIT :lim OFFSET :offset"; 
       $lim = self::SHOW_BY_DEFAULT;
       $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
       $statement = $db->prepare($query);
       $statement->bindParam(':lim', $lim, PDO::PARAM_INT);
       $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
       if($statement->execute()){
           return $statement->fetchAll(PDO::FETCH_ASSOC);
       }
       return $statement->errorInfo();
    }
    
    public static function countAll(){
        $db = Db::getConnection();
        $query = "SELECT COUNT(`id`) AS total FROM `order`";
        $statement = $db->prepare($query);
        if($statement->execute()){
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            return $res['total'];
        }
        return 0;
    }
    
    public static function getUserOrders($userId){
       $db = Db::getConnection();
       $query = "SELECT o.* FROM `order` AS o WHERE o.user_id = :user_id"; 
       $statement = $db->prepare($query);
       $statement->bindParam(':user_id', $userId);
       if($statement->execute()){
           return $statement->fetchAll(PDO::FETCH_ASSOC);
       }
       return false;
    }
    
    public static function removeById($orderId){
        $db = Db::getConnection();
        $query = "DELETE FROM `order` WHERE `id` = :id LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $orderId, PDO::PARAM_INT);
        return $statement->execute();
    }
    
    public static function getStatusDescription($statusCode){
        return OrderStatus[intval($statusCode)];
    }*/
