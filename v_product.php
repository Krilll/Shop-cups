<?php

/**
 * Created by PhpStorm.
 * User: 805621
 * Date: 01.03.2019
 * Time: 12:24
 */

?>
<div class="item-content">
    <h2><?= $good[name] ?></h2>
    <div class="img-big"><img src="<?= DIR_BIG.$good[image] ?>" alt="<?= $good[name] ?>" title="<?= $good[name] ?>" height="300px"></div>
    <div class="item_desc clearfix">
        <h3>Объем:</h3>
        <div class="short">
            <p><?= $good[volume] ?></p>
        </div>
        <h3>Описание товара:</h3>
        <div class="short">
            <p><?= $good[description] ?></p>
        </div>
        <div class="o-pay">
            <p class="price"><?= $good[price] ?>р.</p>
            <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
        </div>
    </div>
</div>