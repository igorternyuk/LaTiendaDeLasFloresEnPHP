<?php

/**
 * Description of UserController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class UserController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionShowRegisterForm(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Регистрация');
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'user/register');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
    
    public function actionShowLoginForm(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Авторизация');
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'user/login');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
    
    public function actionRegister(){
        $errors = [];
        
        $username = filter_input(INPUT_POST, 'username');
        if(!User::checkUsername($username)){
            array_push($errors, "Минимальная длина для имени: "
                    . User::USERNAME_LENGTH_MIN);
        }
        
        $pwd1 = filter_input(INPUT_POST, 'pwd1');
        if(!User::checkPassword($pwd1)){
            array_push($errors, "Минимальная длина пароля: "
                    . User::PASSWORD_LENGTH_MIN . " символа");
        }
        
        $pwd2 = filter_input(INPUT_POST, 'pwd2');
        if(!User::checkPasswordMatch($pwd1, $pwd2)){
            array_push($errors, "Пароли не совпадают");
        }
        
        $email = filter_input(INPUT_POST, 'email');
        if(!User::checkEmail($email)){
            array_push($errors, "Неправильный email");
        }
        
        if(User::checkIfEmailExists($email)){
            array_push($errors, "Такой email уже существует");
        }
        
        $userphone = filter_input(INPUT_POST, 'userphone');
        if(!User::checkPhone($userphone)){
            array_push($errors, "Неправильный телефон");
        }
        
        $address = filter_input(INPUT_POST, 'useraddress');
        
        $res = [];
        if(empty($errors)){
            $params = [
                'username' => $username,
                'email' => $email,
                'password' => $pwd1,
                'phone' => $userphone,
                'address' => $address,
                'is_admin' => false
            ];
            if(User::register($params)){
                $res['success'] = true;
            } else {
                $res['success'] = false;
                array_push($errors, "Ошибка регистрации пользователя");
                $res['errors'] = $errors;
            }
            
        } else {
            $res['success'] = false;
            $res['errors'] = $errors;
        }
        
        echo json_encode($res);
        return true;
    }
    
    public function actionLogin(){
        $errors = [];
        $username = filter_input(INPUT_POST, 'username');
        $res = [];
        $res['success'] = true;
        echo json_encode($res);
        return true;
    }
    
    public function actionLogout(){
        $res = [];
        echo json_encode($res);
        return true;
    }
}
