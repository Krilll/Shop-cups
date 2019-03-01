<?php
if ($goods) {
    foreach ($goods as $good) {
        ?>
        <div class="item">
            <a href="index.php?c=page&act=product&id=<?= $good[id] ?>">
                <h3 class="item-name"><?= $good[name] ?></h3>
                <img src="<?= DIR_SMALL.$good[image] ?>" alt="<?= $good[name] ?>"title="<?= $good[name] ?>">
            </a>

            <p class="price"><?= $good[price] ?>р.</p>
            <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
        </div>
        <?
    }
}
?>
<div id = 'new'>

</div>
<button id='yet' class='add-to-basket' type='submit'>Ещё...</button>
