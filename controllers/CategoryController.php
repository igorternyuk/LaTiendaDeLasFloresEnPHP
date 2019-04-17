<?php

/**
 * Description of CategoryController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class CategoryController extends BaseController{
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionAdd(){
        $name = filter_input(INPUT_POST, 'categoryName');
        $parentId = filter_input(INPUT_POST, 'parentId');
        $status = filter_input(INPUT_POST, 'status');
        $sortOrder = filter_input(INPUT_POST, 'sortOrder');
        
        $res = [];
        if(Category::addNew($name, $parentId, $sortOrder, $status)){
            $res['success'] = true;
            $res['message'] = "Новая категория успешно добавлена";
        } else {
            $res['success'] = false;
            $res['message'] = "Ошибка добавления категории";
        }
        echo json_encode($res);
        return true;
    }
    
    public function actionUpdate($categoryId){
        $name = filter_input(INPUT_POST, 'categoryName');
        $parentId = filter_input(INPUT_POST, 'parentId');
        $status = filter_input(INPUT_POST, 'status');
        $sortOrder = filter_input(INPUT_POST, 'sortOrder');
        
        $res = [];
        if(Category::update($categoryId, $name, $parentId, $sortOrder, $status)){
            $res['success'] = true;
            $res['message'] = "Новая категория успешно обновлена";
        } else {
            $res['success'] = false;
            $res['message'] = "Ошибка обновления категории";
        }
        echo json_encode($res);
        return true;
    }
    
    public function actionRemove($categoryId){
        $res = [];
        if(Category::removeById($categoryId)){
            $res['success'] = true;
            $res['message'] = "Категория успешно удалена";
        } else {
            $res['success'] = false;
            $res['message'] = "Ошибка удаления категории";
        }
        echo json_encode($res);
        return true;
    }
}
