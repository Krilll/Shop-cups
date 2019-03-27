<?php

include_once 'DB.php';

class Basket extends DB {

	public $id_product, $id_user, $count;

	public function getBasket($id_user) {
		if(isset($_COOKIE['guest'])) {
			setcookie('guest',"",time()- 3600 * 24 * 30);
		}
		
		return parent::getRows("SELECT `products`.`name`, `products`.`price`, `products`.`image`,
								`basket`.`count`, `basket`.`id` AS 'idB', `basket`.`id_product`
								FROM `basket` INNER JOIN `products` 
								ON `basket`.`id_user`= '$id_user'
								AND `basket`.`id_product`=`products`.`id`
								AND `basket`.`ordered` IS NULL");
	}
	
	public function getGuestBasket($id_guest) {

		$row = parent::getRow("SELECT * FROM `guests` WHERE `cookie` = '$id_guest'");
			if($row) {
				return parent::getRows("SELECT `products`.`name`, `products`.`price`, `products`.`image`,
								`basket`.`count`, `basket`.`id` AS 'idB', `basket`.`id_product`
								FROM `basket` INNER JOIN `products` INNER JOIN `guests`
								ON `guests`.`cookie`= '$id_guest'
								AND `basket`.`id_guest`= `guests`.`id`
								AND `basket`.`id_product`=`products`.`id`
								AND `basket`.`ordered` IS NULL");
			} else {
				parent::insert("INSERT INTO `guests`(`cookie`) VALUES ('$id_guest')");
			}
	}
	
	// удалить
	public function deleteItem ($id) {
		$row = parent::getRow("SELECT * FROM `basket` WHERE `id` = '$id' ");
		$price = parent::getRow("SELECT `products`.`price` FROM `products` INNER JOIN `basket` 
		ON `basket`.`id_product` = `products`.`id` AND `basket`.`id` = '$id'");
		$count = $row[count];
		if($count > 1) {
			$count --;
			parent::update("UPDATE `basket` SET `count` = '$count' WHERE `id` = '$id'");
			printf ($count);
			printf (',');
			printf ($price[price]);						
		} else {
			parent::delete("DELETE FROM `basket` WHERE `id` = '$id'");
			printf('delete');
			printf (',');
			printf ($price[price]);				
		}
	}

	public function addItem($id, $user) {
		
		if($user === 'guest') {
			$cookie = $_COOKIE['guest'];
			$row = parent::getRow("SELECT * FROM `guests` WHERE `cookie` = '$cookie'");
			if(!$row) {
				parent::insert("INSERT INTO `guests`(`cookie`) VALUES ('$cookie')");
			}
			
			$row = parent::getRow("SELECT * FROM `basket` INNER JOIN `guests` ON `guests`.`cookie`= '$cookie'
								AND `basket`.`id_guest`= `guests`.`id` AND  `id_product` = '$id' AND `ordered` IS NULL");
			if($row) {
				parent::update("UPDATE `basket` SET `count` = `count`+1 WHERE `id_guest` = '$row[id]' AND `id_product` = '$id'");
				printf ('Еще один товар успешно добавлен в Вашу корзину!');
			} else {
				$row = parent::getRow("SELECT * FROM `guests` WHERE `guests`.`cookie`= '$cookie'");
				parent::insert("INSERT INTO `basket`(`id_product`, `id_guest`, `count`) 
								VALUES ('$id','$row[id]',1)");
				printf ('Товар успешно добавлен в Вашу корзину!');
			}
		} else {
			$row = parent::getRow("SELECT * FROM `basket` WHERE `id_user` = '$user' AND  `id_product` = '$id' AND `ordered` IS NULL");

			if($row) {
				parent::update("UPDATE `basket` SET `count` = `count`+1 WHERE `id_user` = '$user' AND `id_product` = '$id'");
				printf ('Еще один товар успешно добавлен в Вашу корзину!');
			} else {
				parent::insert("INSERT INTO `basket`(`id_product`, `id_user`, `count`) 
								VALUES ('$id','$user',1)");
				printf ('Товар успешно добавлен в Вашу корзину!');
			}
		}
	}
	
	//оформить корзину зарегистрированного пользователя
	public function checkItems ($id) {
		parent::update("UPDATE `basket` SET `ordered` = 1 WHERE `id_user` = '$id' AND `ordered` IS NULL");
		printf ('Ваша корзина поступила на обработку администратору сайта. Спасибо за заказ!');
	}
	
	//оформить корзину гостя
	public function checkGuestItems ($name, $lastName, $telephone) {
		$cookie = $_COOKIE['guest'];
		$row = parent::getRow("SELECT * FROM `users` WHERE `name` = '$name' AND `lastName` = '$lastName' 
		AND `telephone` = '$telephone'");
		if(!$row) {
			parent::insert("INSERT INTO `users` (`name`, `lastName`, `telephone`) 
							VALUES ('$name', '$lastName', '$telephone')");
			$row = parent::getRow("SELECT `id` FROM `users` WHERE `name` = '$name' AND `lastName` = '$lastName' 
			AND `telephone` = '$telephone'");
		}
		$rowTwo = parent::getRow("SELECT * FROM `guests` WHERE `cookie` = '$cookie'");
		parent::update("UPDATE `basket` SET `ordered` = 1, `id_user` = '$row[id]' 
						WHERE `id_guest` = '$rowTwo[id]' AND `ordered` IS NULL");
		printf ('Ваша корзина поступила на обработку администратору сайта. Спасибо за заказ!');
	}
}