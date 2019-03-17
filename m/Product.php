<?php
include_once 'DB.php';

class Product extends DB {


    public function getThreeProducts() {

        return parent::getRows("SELECT * FROM products WHERE id < 4");
    }

    public function getThreeNewProducts($MYSQL_NUMBER) {

        return parent::getRows("SELECT * FROM products WHERE id >= '$MYSQL_NUMBER' LIMIT 3");
    }

    public function getProduct($product_id) {

        return parent::getRow("SELECT * FROM products where id='$product_id'");
    }
}