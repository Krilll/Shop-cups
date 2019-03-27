<?php
/**
 * Created by PhpStorm.
 * User: 805621
 * Date: 06.03.2019
 * Time: 20:12
 */

include_once ('m/User.php');

class C_User extends C_Base
{

    public function action_info() {

        $get_user = new User();
        $user_info = $get_user->getUser($_SESSION['user_id']);
        $this->title .= ' | ' . $user_info['name'];
        $this->content = $this->Template('v/v_info.php', array('userlogin' => $user_info['login']));
    }

    public function action_registration()
    {
        $this->title .= '| Войти / Регистрация';
		$this->library = '<script src="js/jquery.maskedinput.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mainCheck.js"></script>
	<script src="m/Check.js"></script>';
        $this->content = $this->Template('v/v_registration.php', array('library' => $library));

        if ($this->isPost()) {
			
            if ($_POST['name']) {
                $new_user = new User();
                $result = $new_user->newUser($_POST['login'], $_POST['name'], $_POST['lastName'], $_POST['telephone'], $_POST['password']);
                $this->content = $this->Template('v/v_registration.php', array('text' => $result));

			} else {
				$login = new User();
				$result = $login->login($_POST['loginNew'], $_POST['passwordNew']);
				$this->content = $this->Template('v/v_registration.php', array('text' => $result));
			}
		}
    }

    public function action_logout() {
        $logout = new User();
        $logout->logout();
    }
}