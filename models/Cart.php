<?php

/**
 * Description of Cart
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class Cart {
    
    public static function addProduct($productId){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $productsInCart = self::getProductIds();
        if(array_key_exists($productId, $productsInCart)){
            ++$productsInCart[$productId];
        } else {
            $productsInCart[$productId] = 1;
        }
        $_SESSION['cart'] = $productsInCart;
    }
    
    public static function removeProduct($productId){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart'][$productId]);
        }
    }
    
    public static function updateProductCount($productId, $newCount){
        if(isset($_SESSION['cart'])){
            $productsInCart = self::getProductIds();
            if(array_key_exists($productId, $productsInCart)){
                $productsInCart[$productId] = $newCount;
            }
            $_SESSION['cart'] = $productsInCart;
        }
    }
    
    public static function calcTotalItems(){
        $totalItems = 0;
        $productInCart = self::getProductIds();
        foreach($productInCart as $productID => $count){
            $totalItems += $count;
        }
        return $totalItems;
    }
    
    public static function calcTotalSum(){
        $totalSum = 0;
        $productsInCart = self::getProductIds();
        foreach($productsInCart as $productId => $count){
            $product = Product::getById($productId);
            $totalSum += $product['price'] * $count; 
        }
        return $totalSum;
    }
    
    public static function getProductIds(){
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
    
    public static function getProducts(){
        $ids = self::getProductIds();        
        $products = [];
        foreach ($ids as $id => $count){
            $product = Product::getById($id);
            $product['count'] = $count;
            $product['subtotal'] = $product['price'] * $count;
            $product['image'] = Product::getImage($id);
            array_push($products, $product);
        }
        
        return $products;
    }
    
    public static function getProductSubtotal($productId){
        $counts = self::getProductIds();
        $product = Product::getById($productId);
        return isset($counts[$productId]) ? $counts[$productId] * $product['price'] : 0;
    }
    
    public static function clear(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }
}
