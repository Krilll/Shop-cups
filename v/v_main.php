<?php

/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=UTF-81" http-equiv="content-type">
    <link href="https://fonts.googleapis.com/css?family=Caveat:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="v/style.css" />
</head>
<body>
	<div id="header">
        <a href="index.php" class="logo">
            <img src="../images/main/logo.png" alt="логотип интернет-магазина "Кружки для всех">
        </a>
        <div class = "headerText">
            <h1>
                Интернет-магазин "Кружки для всех"
                <br>
            </h1>
            <h2>
                Устройте своё Безумное чаепитие!
                <br><br><br><br>
            </h2>
        </div>
	</div>
    </div>
	<nav id="menu">
        <ul>
            <li><a href="index.php">Главная  </a></li>
            <li><a href="index.php?c=page&act=catalog">Каталог </a></li>
            <li><a href="index.php?c=page&act=basket">Корзина </a></li>

        <?php
        if ($user['name']) {
            echo '<li><a href="index.php?c=user&act=logout">Выйти ('. $user['name'] .')</a></li>';
            //проверка на админа => открываем еще окно спец. для него
            if ($user['role']) {
                echo ' <li><a href="index.php?c=admin&act=orders">Управление</a></li>';
            }
        } else {
            echo '<li><a href="index.php?c=user&act=registration">Войти / Регистрация </a></li>';
        }
        ?>

        </ul>
	</nav>
	
	<div id="content">
        <?=$content?>
	</div>

	<div id="footer">
        &#169; Все права защищены. Адрес. Телефон. <?=$date . " г." ?>
	</div>
	
    <script src="js/jquery-1.8.3.min.js"></script>
	
    <script src="js/button.js"></script>
	<?=$library ?>

</body>
</html>
