<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы
    protected $isAuth;
    protected $headerText;
    function __construct()
    {
    }

    protected function before()
    {
        $this->title = 'Сайт повелевает';
        $this->content = '';
        $this->isAuth = 0;
        $this->headerText = header_text_get();
    }

    //
    // Генерация базового шаблонаы
    //
    public function render()
    {
        $vars = array('isAuth' => $this->isAuth, 'title' => $this->title, 'headerText' => $this->headerText, 'content' => $this->content);
        $page = $this->Template('v/v_main.php', $vars);
        echo $page;
    }
}
