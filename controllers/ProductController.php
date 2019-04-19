<?php

/**
 * Description of ProductController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class ProductController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }

    public function actionView($productId){
        parent::loadCommon();
        $currentProduct = Product::getById($productId);
        $currentProduct['image'] = Product::getImage($productId);
        $categoryId = $currentProduct['category_id'];
        $similarProducts = Product::getByCategoryId($categoryId);
        $keyToRemove = 0;
        foreach ($similarProducts as $key => &$product){
            $product['image'] = Product::getImage($product['id']);
            if($product['id'] == $currentProduct['id']){
                $keyToRemove = $key;
            }
        }
        unset($similarProducts[$keyToRemove]);
        
        $this->smarty->assign('pageTitle', 'Олюсин магазин');
        $this->smarty->assign('currentProduct', $currentProduct);
        $this->smarty->assign('similarProducts', $similarProducts);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'product');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public function actionAdd(){
        User::ensureAdmin();
        parent::loadCommon();
        $res = [];
        $errors = [];
        $inputFormWasSent = filter_input(INPUT_POST, 'btnAddProduct');
        if($inputFormWasSent){
            $params = [];
            $params['name'] = filter_input(INPUT_POST, 'name');
            $params['code'] = filter_input(INPUT_POST, 'code');
            $params['category_id'] = filter_input(INPUT_POST, 'categoryId');
            $params['price'] = filter_input(INPUT_POST, 'price');
            $params['stock'] = filter_input(INPUT_POST, 'stock');
            $params['brand'] = filter_input(INPUT_POST, 'brand');
            $params['discount'] = filter_input(INPUT_POST, 'discount');
            $params['short_description'] = filter_input(INPUT_POST, 'short_description');
            $params['description'] = filter_input(INPUT_POST, 'description');
            $isProductRecommended = filter_input(INPUT_POST, 'isRecommended');
            $params['is_recommended'] = $isProductRecommended ? 1 : 0;
            $productStatus = filter_input(INPUT_POST, 'status');
            $params['status'] = $productStatus ? 1 : 0;
            $isProductNew = filter_input(INPUT_POST, 'isNew');
            $params['is_new'] = $isProductNew ? 1 : 0;
            $isProductAvailable = filter_input(INPUT_POST, 'isAvailable');
            $params['available'] = $isProductAvailable ? 1 : 0;
            
            if(isset($params['name']) && empty($params['name'])){
                $errors[] = "Введите имя товара";
            }
            
            if(empty($errors)){
                $insertedProductId = Product::addNew($params);
                //Utils::debug($insertedProductId);
                $image = NoImage;
                if($insertedProductId){
                    if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
                        $localPath = PathToProductImages;
                        $image = Utils::uploadFile($insertedProductId,
                                $localPath, true);
                    }
                    //Utils::debug($image);
                    $imageUpdated = Product::updateImage($insertedProductId, $image);
                    if($imageUpdated){
                        $res['success'] = true;
                        $res['message'] = 'Новый товар успешно добавлен';
                    } else {
                        $res['success'] = false;
                        $errors[] = "Ошибка обновления изображения товара";
                    }
                } else {
                    $res['success'] = false;
                    $errors[] = 'Ошибка добавления товара';
                }                
            } else {
                $res['success'] = false;
                $errors[] = 'Некорректно заполненная форма';
            }            
        }
        $this->smarty->assign('success', $res['success']);
        $this->smarty->assign('errors', $errors);
        if(isset($res['message'])){
            $this->smarty->assign('message', $res['message']);
        }
        $this->smarty->assign('pageTitle', 'Результат');
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/message');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionUpdate(){
        User::ensureAdmin();
        parent::loadCommon();
        $res = [];
        $errors = [];
        $inputFormWasSent = filter_input(INPUT_POST, 'btnUpdateProduct');
        if($inputFormWasSent){
            $params = [];
            $params['id'] = filter_input(INPUT_POST, 'productId');
            $params['name'] = filter_input(INPUT_POST, 'name');
            $params['code'] = filter_input(INPUT_POST, 'code');
            $params['category_id'] = filter_input(INPUT_POST, 'categoryId');
            $params['price'] = filter_input(INPUT_POST, 'price');
            $params['stock'] = filter_input(INPUT_POST, 'stock');
            $params['brand'] = filter_input(INPUT_POST, 'brand');
            $params['discount'] = filter_input(INPUT_POST, 'discount');
            $params['short_description'] = filter_input(INPUT_POST, 'short_description');
            $params['description'] = filter_input(INPUT_POST, 'description');
            $isProductRecommended = filter_input(INPUT_POST, 'isRecommended');
            $params['is_recommended'] = $isProductRecommended ? 1 : 0;
            $productStatus = filter_input(INPUT_POST, 'status');
            $params['status'] = $productStatus ? 1 : 0;
            $isProductNew = filter_input(INPUT_POST, 'isNew');
            $params['is_new'] = $isProductNew ? 1 : 0;
            $isProductAvailable = filter_input(INPUT_POST, 'isAvailable');
            $params['available'] = $isProductAvailable ? 1 : 0;
            
            if(isset($params['name']) && empty($params['name'])){
                $errors[] = "Введите имя товара";
            }
            
            if(empty($errors)){
                $productUpdated = Product::update($params);
                //Utils::debug($insertedProductId);
                $image = NoImage;
                if($productUpdated){
                    if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
                        $localPath = PathToProductImages;
                        $image = Utils::uploadFile($params['id'],
                                $localPath, true);
                        $imageUpdated = Product::updateImage($params['id'], $image);
                        if($imageUpdated){
                            $res['success'] = true;
                            $res['message'] = 'Новый товар успешно добавлен';
                        } else {
                            $res['success'] = false;
                            $errors[] = "Ошибка обновления изображения товара";
                        }
                    } else {
                        $res['success'] = true;
                        $res['message'] = 'Новый товар успешно обновлен';
                    }
                    
                } else {
                    $res['success'] = false;
                    $errors[] = 'Ошибка обновления товара';
                }                
            } else {
                $res['success'] = false;
                $errors[] = 'Некорректно заполненная форма';
            }            
        }
        $this->smarty->assign('success', $res['success']);
        $this->smarty->assign('errors', $errors);
        if(isset($res['message'])){
            $this->smarty->assign('message', $res['message']);
        }
        $this->smarty->assign('pageTitle', 'Результат');
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/message');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionRemove(){
        $res = [];
        $id = filter_input(INPUT_POST, 'id');
        if(Product::removeById($id)){
            $res['success'] = true;
            $res['message'] = "Товар успешно удален";
        } else {
            $res['success'] = false;
            $res['message'] = "Ошибка удаления товара";
        }
        echo json_encode($res);
        return true;
    }
}
