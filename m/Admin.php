<?php

include_once ('DB.php');

class Admin extends DB {
		
	//отображение сетки заказов
	public function getOrders (){
		return parent::getRows("SELECT `users`.`name` AS 'nameU', `users`.`lastName`, `users`.`telephone`, 
							`products`.`name`, `products`.`price`, `basket`.`count`, `basket`.`id` AS 'idB',
							`basket`.`in_work` AS 'work', `basket`.`sent` 
							FROM `basket` INNER JOIN `users` INNER JOIN `products` 
							ON `basket`.`id_product`=`products`.`id` 
							AND `basket`.`id_user`=`users`.`id`
							AND `basket`.`ordered` IS NOT NULL
							AND `basket`.`exist`=1");
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
			parent::update("UPDATE `basket` SET `exist` = 0 WHERE `id` = '$id'");
			printf('delete');			
		}
		//echo "$row[id_product]. $row[id_product]";
	}
	
	//оформить
	public function workItem ($id) {
		parent::update("UPDATE `basket` SET `in_work` = 1 WHERE `id` = '$id'");
	}
	
	//отправить
	public function sentItem ($id) {
		parent::update("UPDATE `basket` SET `sent` = 1 WHERE `id` = '$id'");
	}
	
	
	
		/*public $order_id, $product_id, $user_id, $count, $status;

		public function getBasket($user_id) {

			return parent::Select('basket', 'user_id', $user_id, true);
		}

		public function addProduct($product_id, $user_id, $count) {

			$object = [
				'product_id' => $product_id,
				'user_id' => $user_id,
				'count' => strip_tags($count)
			];
			
			parent::Insert('basket', $object);
			return 'Товар успешно добавлен в корзину!';
		}*/
}
?>