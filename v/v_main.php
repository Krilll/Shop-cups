<?php
//session_start();
//$isAuth = 0;
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $headerText - текст header
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=UTF-81" http-equiv="content-type">
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
        <div class = "headerText">
        <h3><?=$headerText?></h3>
            <image src = "../images/main/cup.svg" width = "100px">
        </div>
		<h1><?=$title?></h1>

	</div>

    </div>
	<div id="menu">
		<a href="index.php">Главная</a> |
        <a href="index.php?c=page&act=catalog">Каталог</a> |
        <a href="index.php?c=page&act=basket">Корзина</a>
	</div>
	
	<div id="content">
        <?=$content?>
	</div>

	<div id="footer">
        Все права зищищены. Адрес. Телефон.
	</div>
</body>
</html>