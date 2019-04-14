<?php

/**
 * Description of User
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class User {
    const USERNAME_LENGTH_MIN = 3;
    const PASSWORD_LENGTH_MIN = 6;
    
    public static function checkUsername($username){
        return strlen($username) >= self::USERNAME_LENGTH_MIN;
    }
    
    public static function checkEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }
    
    public static function checkPassword($password){
        return strlen($password) >= self::PASSWORD_LENGTH_MIN;
    }
    
    public static function checkPasswordMatch($pwd1, $pwd2){
        return strcmp($pwd1, $pwd2) == 0;
    }
    
    public static function checkIfEmailExists($email){
        $sql = "SELECT COUNT(*) AS total FROM `user` WHERE `email` = :email";
        $options = [
            [
                'placeholder' => ':email',
                'value' => $email,
                'type' => PDO::PARAM_STR
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            return $res[0]['total'] > 0;
        }
        return false;
    }
    
    public static function checkUserCredentials($email, $password){
        $sql = "SELECT `id` FROM `user` WHERE `email` = :email"
                . " AND `password` = :password;";
        $encryptedPassword = md5($password);
        $options = [
            [
                'placeholder' => ':email',
                'value' => $email,
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':password',
                'value' => $encryptedPassword,
                'type' => PDO::PARAM_STR
            ]
        ];
        $res = Db::executeSelection($sql, $options);        
        if($res){
            return $res[0]['id'];
        }
        return false;
    }
    
    public static function checkPhone($phone){
        $pattern = "~([+38]?)0((50)|(63)|(66)|(67)|(68)|(93)|(95)|(96)|(97)|"
                . "(98)|(99))([0-9]{6})~";
        return preg_match($pattern, $phone);
    }
    
    public static function register($params){
        $encryptedPassword = md5($params['password']);
        $db = Db::getConnection();
        $query = "INSERT INTO `user` (`name`, `email`, `password`, `address`, `phone`)"
                . " VALUES(:username, :email, :password, :address, :phone)";
        $statement = $db->prepare($query);
        $statement->bindParam(':username', $params['username'], PDO::PARAM_STR);
        $statement->bindParam(':email', $params['email'], PDO::PARAM_STR);
        $statement->bindParam(':password', $encryptedPassword, PDO::PARAM_STR);
        $statement->bindParam(':phone', $params['phone'], PDO::PARAM_STR);
        $statement->bindParam(':address', $params['address'], PDO::PARAM_STR);
        $userAdded = $statement->execute();
        $user_id = $db->lastInsertId();
        $query = "INSERT INTO `user_role` (`user_id`, `role_id`)"
                . " VALUES(:user_id, :role_id)";
        $statement = $db->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $roleId = $params['is_admin'] ? 1 : 2;
        $statement->bindParam(':role_id', $roleId , PDO::PARAM_INT);
        $roleAdded = $statement->execute();
        return $userAdded && $roleAdded;
    }
    
    public static function getById($userId){
        $sql = "SELECT * FROM `user` WHERE `id` = :id LIMIT 1;";
        $options = [            [
                'placeholder' => ':id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            return $res[0];
        }
        return false;
    }
    
    public static function update($userId, $name, $password = null){
        $sql = "UPDATE `user` SET `name` = :name ";
        
        if($password != null){
            $query .= " , `password` = :password ";
        }
        
        $query .= " WHERE `id` = :id LIMIT 1;";
        
        $options = [
            [
                'placeholder' => ':name',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ],
            [
                'placeholder' => ':id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        
        if($password != null){
            $encryptedPassword = md5($password);
            array_push($options,
                [            
                    'placeholder' => ':password',
                    'value' => $encryptedPassword,
                    'type' => PDO::PARAM_STR
                ]
            );
        }        
        return Db::executeUpdate($sql, $options);
    }
    
    public static function removeById($userId){
        $sql = "DELETE * FROM `user` WHERE id = :id LIMIT 1;";
        $options = [
            [
                'placeholder' => ':id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $userRemoved = Db::executeUpdate($sql, $options);
        $sql = "DELETE * FROM `user_role` WHERE `user_id` = :id LIMIT 1;";
        $roleRemoved = Db::executeUpdate($sql, $options);
        return $userRemoved && $roleRemoved;
    }

    public static function login($userId){
        $_SESSION['user'] = $userId;
    }
    
    public static function logout(){
        unset($_SESSION['user']);
    }
    
    public static function checkIfLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        
        Utils::redirect("/user/login");
    }
    
    public static function getLoggedUserId(){
        return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
    }
    
    public static function isGuest(){
        return !isset($_SESSION['user']);
    }
    
    public static function getUserRoles($userId){
        $sql = "SELECT u.id, u.name, ur.role_id, r.name FROM `user_role` AS ur"
                . " LEFT JOIN `role` AS r ON ur.role_id = r.id"
                . " LEFT JOIN `user` AS u ON ur.user_id = u.id"
                . " WHERE u.id = :user_id";
        $options = [            [
                'placeholder' => ':user_id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        
        return Db::executeSelection($sql, $options);
    }
    
    public static function checkIfAdmin($userId){
        $sql = "SELECT ur.role_id, r.name FROM `user_role` AS ur"
                . " LEFT JOIN `role` AS r ON ur.role_id = r.id"
                . " LEFT JOIN `user` AS u ON ur.user_id = u.id"
                . " WHERE r.id = 1 AND r.name = 'admin' AND u.id = :user_id";
        $options = [            [
                'placeholder' => ':user_id',
                'value' => $userId,
                'type' => PDO::PARAM_INT
            ]
        ];
        $res = Db::executeSelection($sql, $options);
        if($res){
            $userRole = $res[0];
            return $userRole['role_id'] == 2 && $userRole['name'] == 'admin';
        }
        return false;
    }
    
    public static function getAllAdmins(){
        $sql = "SELECT u.* FROM `user_role` AS ur"
                . " LEFT JOIN `role` AS r ON ur.role_id = r.id"
                . " LEFT JOIN `user` AS u ON ur.user_id = u.id"
                . " WHERE r.id = 1 AND r.name = 'admin'";
        return Db::executeSelection($sql);
    }
}
