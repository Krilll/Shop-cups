<?php
/**
 * Шаблон товара
 * =======================
 * $goods - массив товаров
 */
 
 
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
			<a href="#" title="Добавить в корзину" class="add-to-basket">Купить</a></br/><br/>
		</div>
	<? } 
} else {
    echo "Вы промотрели все записи, представленные в базе данных..."; //Если записи закончились
}
if(!$MYSQL_NUMBER) {
	?> </div> 
<? }
