<?php
require_once "../m/db.php";

if (isset($_GET['number'])) {
    $MYSQL_NUMBER = $_GET['number'];
    $products = DB::getRows("SELECT * FROM products WHERE id >= '$MYSQL_NUMBER' LIMIT 3");
    //print_r($MYSQL_NUMBER);

    if ($products) {
        foreach ($products as $product) {
            $MYSQL_NUMBER++;
            ?>
            <div class="item">
                <a href="index.php?c=page&act=product&id=<?= $product[id] ?>">
                    <h3 class="item-name"><?= $product[name] ?></h3>
                    <img src="<?= DIR_SMALL.$product[image] ?>" alt="<?= $product[name] ?>"title="<?= $product[name] ?>">
                </a>
                <p class="price"><?= $product[price] ?>р.</p>
                <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
            </div>
            <?
        }
    } else {
        echo "Вы промотрели все записи, представленные в базе данных..."; //Если записи закончились
    }
}

