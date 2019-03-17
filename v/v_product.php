<?php

/**
 * Created by PhpStorm.
 * User: 805621
 * Date: 01.03.2019
 * Time: 12:24
 */

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
		<a href="#" title="Добавить в корзину" class="add-to-basket">Купить</a>
    </div>    
    
</div>