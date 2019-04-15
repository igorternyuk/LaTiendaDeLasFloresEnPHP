<?php

/**
 * Description of OrderItem
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class OrderItem {
    public static function createNew($params){
        $sql = "INSERT INTO `order_item` (`order_id`, `product_id`,"
                . " `count`, `subtotal`) VALUES(:order_id, :product_id,"
                . ":count, :subtotal)";
        $options = [            
            [
                'placeholder' => ':order_id',
                'value' => $params['order_id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':product_id',
                'value' => $params['product_id'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':count',
                'value' => $params['count'],
                'type' => PDO::PARAM_INT
            ],
            [
                'placeholder' => ':subtotal',
                'value' => $params['subtotal'],
                'type' => PDO::PARAM_INT
            ],
        ];
        
        return Db::executeUpdate($sql, $options);
    }
    
    public static function getAllOrderItemsByOrderId($orderId){
        $sql = "SELECT oi.*, p.code AS product_code, p.name AS product_name,"
                . " p.price AS product_price FROM `order_item` AS oi"
                . " LEFT JOIN `product` AS p ON oi.product_id = p.id"
                . " WHERE oi.order_id = :order_id ORDER BY oi.subtotal DESC";
        $options = [            
            [
                'placeholder' => ':order_id',
                'value' => $orderId,
                'type' => PDO::PARAM_INT
            ]
        ];
        
        return Db::executeSelection($sql, $options);
    }
}

