<?php
/**
 * Created by PhpStorm.
 * User: 805621
 * Date: 06.03.2019
 * Time: 18:05
 */

include_once ('DB.php');

class User extends DB {

    public function getUser ($id) {

        return parent::getRow("SELECT * FROM users WHERE  id = '$id'");
    }

    public function newUser ($login, $name, $lastName, $telephone, $password) {

        $object = [
            'login' => strip_tags($login),
            'name' => strip_tags($name),
            'lastName' => strip_tags($lastName),
            'telephone' => strip_tags($telephone),
            'password' => parent::Password(strip_tags($login), strip_tags($password))
        ];

        $user = parent::getRow("SELECT * FROM users WHERE  login = '$login'");

		
        if (!$user) {
            $columns = array();

            foreach ($object as $key => $value) {

                $columns[] = $key;
                $masks[] = ":$key";
                if ($value === null) {
                    $object[$key] = 'NULL';
                }
            }
            $columns_s = implode(',', $columns);
            $masks_s = implode(',', $masks);

            parent::insert("INSERT INTO users ($columns_s) VALUES ($masks_s)",$object);
            return 'Вы успешно зарегистрировались под логином '. $login .'!';
        } else {
            return 'Пользователь с таким логином уже зарегистрирован!';
        }
    }

    public function login ($login, $password) {

        $loginUser =  strip_tags($login);
        $user = parent::getRow("SELECT * FROM users WHERE  login = '$loginUser'");

        if ($user) {
            $DB =  strip_tags($password);
            $passwordDB = parent::Password($user['login'],$DB);
            if ($user['password'] == $passwordDB) {
                $_SESSION['user_id'] = $user['id'];
                return 'Добро пожаловать в систему, ' . $user['login'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    public function logout () {

        if (isset($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
            session_destroy();
            return true;
        } else {
            return false;
        }
    }
}
