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
        foreach ($similarProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        //Utils::debug($similarProducts);
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
            $options = [];
            $options['name'] = filter_input(INPUT_POST, 'name');
            $options['code'] = filter_input(INPUT_POST, 'code');
            $options['category_id'] = filter_input(INPUT_POST, 'categoryId');
            $options['price'] = filter_input(INPUT_POST, 'price');
            $options['stock'] = filter_input(INPUT_POST, 'stock');
            $options['brand'] = filter_input(INPUT_POST, 'brand');
            $options['discount'] = filter_input(INPUT_POST, 'discount');
            $options['short_description'] = filter_input(INPUT_POST, 'short_description');
            $options['description'] = filter_input(INPUT_POST, 'description');
            $isProductRecommended = filter_input(INPUT_POST, 'isRecommended');
            $options['is_recommended'] = $isProductRecommended ? 1 : 0;
            $productStatus = filter_input(INPUT_POST, 'status');
            $options['status'] = $productStatus ? 1 : 0;
            $isProductNew = filter_input(INPUT_POST, 'isNew');
            $options['is_new'] = $isProductNew ? 1 : 0;
            $isProductAvailable = filter_input(INPUT_POST, 'isAvailable');
            $options['available'] = $isProductAvailable ? 1 : 0;
            
            if(isset($options['name']) && empty($options['name'])){
                $errors[] = "Введите имя товара";
            }
            
            if(empty($errors)){
                $insertedProductId = Product::addNew($options);
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
        
    }
    
    public function actionRemove(){
        
    }
}
