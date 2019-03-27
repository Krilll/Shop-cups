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

if (isset($_GET['number'])) {

	require_once "../m/DB.php";
	require_once "../m/Product.php";
    $MYSQL_NUMBER = $_GET['number'];
    $product_object = new Product();
	
	$products = $product_object->getThreeNewProducts($MYSQL_NUMBER);
}



if ($products) {
	if($MYSQL_NUMBER){
		$MYSQL_NUMBER+=3;
	} else { 
		?> <div id='products'> <?
	} ?>
		
	<? foreach ($products as $product) { ?>
		<div class="item">
			<a href="index.php?c=page&act=product&id=<?= $product[id] ?>">
				<h3 class="item-name"><?= $product[name] ?></h3>
				<img src="<?= DIR_SMALL . $product[image] ?>" alt="<?= $product[name] ?>">
			</a>
			<p class="price"><?= $product[price] ?>р.</p>
			
			<a href="#" id="add_<?=$product[id]?>_<?=$user_id?>" title="Добавить в корзину" class="add-to-basket"
			 >Купить</a>
			</br/><br/>
		</div>
	<? } 
} else {
    echo "Вы промотрели все товары, находящиеся на складе в данный момент..."; //Если записи закончились
}
if(!$MYSQL_NUMBER) {
	?> </div> 
<? }
