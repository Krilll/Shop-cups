<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
	if(isset($_COOKIE['guest'])) {
		setcookie('guest',"",time()-3600 * 24 * 30);
	}
} else {
    $user_id = 'guest';
	
	if(isset($_COOKIE['guest']) === false) {
		setcookie(guest,date("l dS of F Y h:I:s A"), time()+3600 * 24 * 30);
	}
}
?>
<div class="item product">
    <h2><?= $product[name] ?></h2>
    <img class="big-image"src="<?= DIR_BIG.$product[image] ?>" alt="<?= $product[name] ?>" title="<?= $product[name] ?>" height="300px">
    <div class="big-item-information">
		<h3>Объем:</h3>
		<p><?= $product[volume] ?> литров</p>
		<h3>Описание товара:</h3>
		<p class="text"><?= $product[description] ?></p>
		<h3>Цена:</h3>
		<p><?= $product[price] ?> р. <br/><br/></p>
		<a href="#" id="add-big_<?=$product[id]?>_<?=$user_id?>" title="Добавить в корзину" class="add-to-basket">Купить</a>
    </div>    
    
</div>