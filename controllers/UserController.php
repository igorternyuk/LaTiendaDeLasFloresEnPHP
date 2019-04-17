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
        $this->smarty->assign('registerPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'user/register');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public function actionShowLoginForm(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Авторизация');
        $this->smarty->assign('loginPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'user/login');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        $res = [];
        $id = User::checkUserCredentials($email, $password);
        if($id){
            User::login($id);
            $res['success'] = true;
        } else {
            $res['success'] = false;
            array_push($errors, "Неправльный email или пароль");
            $res['errors'] = $errors;
        }        
        
        echo json_encode($res);
        return true;
    }
    
    public function actionLogout(){
        User::logout();
        $res = [];
        $res['success'] = true;
        echo json_encode($res);
        return true;
    }
    
    public function actionUpdate(){
        $errors = [];
        
        $username = filter_input(INPUT_POST, 'username');
        if(!User::checkUsername($username)){
            array_push($errors, "Минимальная длина для имени: "
                    . User::USERNAME_LENGTH_MIN);
        }
        
        $pwd1 = filter_input(INPUT_POST, 'pwd1');
        if(isset($pwd1) && $pwd1 != ''){
            if(!User::checkPassword($pwd1)){
                array_push($errors, "Минимальная длина пароля: "
                        . User::PASSWORD_LENGTH_MIN . " символа");
            } else {
                $pwd2 = filter_input(INPUT_POST, 'pwd2');
                if(!User::checkPasswordMatch($pwd1, $pwd2)){
                    array_push($errors, "Пароли не совпадают");
                }
            }
        } else {
            $pwd1 = null;
        }
        
        $email = filter_input(INPUT_POST, 'email');
        if(!User::checkEmail($email)){
            array_push($errors, "Неправильный email");
        }
        
        if(!User::checkIfEmailExists($email)){
            array_push($errors, "Пользователя с таким email не зарегистрирован");
        }
        
        $userphone = filter_input(INPUT_POST, 'phone');
        if(!User::checkPhone($userphone)){
            array_push($errors, "Неправильный телефон");
        }
        
        $address = filter_input(INPUT_POST, 'address');
        
        $currentPassword = filter_input(INPUT_POST, 'currentPassword');
        if(!User::checkPassword($currentPassword)){
            array_push($errors, "Минимальная длина пароля: "
                    . User::PASSWORD_LENGTH_MIN . " символа");
        }
        
        $res = [];
        if(empty($errors)){
            $id = User::checkUserCredentials($email, $currentPassword);
            if($id){
                $params = [
                    'id' => User::getLoggedUserId(),
                    'name' => $username,
                    'password' => $pwd1,
                    'phone' => $userphone,
                    'address' => $address,
                ];
                User::update($params);
                $res['success'] = true;
            } else {
                $res['success'] = false;
                array_push($errors, "Неправильный текущий пароль");
            }
            
        } else {
            $res['success'] = false;
            $res['errors'] = $errors;
        }
        
        echo json_encode($res);
        return true;
    }
}
