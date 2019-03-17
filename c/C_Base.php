<?php
//
// Базовый контроллер сайта.
//
include_once ('m/User.php');

abstract class C_Base extends C_Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы
	protected $library;
    function __construct()
    {
    }

    protected function before()
    {
        $this->title = 'Кружки ';
        $this->content = '';
		$this->library = '';
    }

    //
    // Генерация базового шаблонаы
    //
    public function render()
    {
        $get_user = new User();
        if (isset($_SESSION['user_id'])) {
            $user_info = $get_user->getUser($_SESSION['user_id']);
        } else {
            $user_info['name'] = false;
        }
        $vars = array('title' => $this->title, 'content' => $this->content,
            'user' => $user_info, 'date' => date("d.m.Y"), 'library' => $this->library);

        //$vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->Template('v/v_main.php', $vars);
        echo $page;
    }
}
