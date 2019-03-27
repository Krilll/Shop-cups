<?php
include_once 'm/Admin.php';
class C_Admin extends C_Base {
		
	public function action_orders() {
		$this->title .= '| Управление';	
		$admin_object = new Admin();
		$orders = $admin_object->getOrders();	
		$this->content = $this->Template('v/v_admin.php', array('products' => $orders));
		
		if($this->isPost()) {
			//printf("ddd");
			if ($_POST['update']) {
				//printf("HEELLO");
				
			} else {
				//printf("Goodbye");
			}
				//$new_basket = new Basket();
				//$result = $new_basket->addProduct($product['id'], $user_id, $_POST['count']);
				//$this->content = $this->Template('v/v_product.php', array('product' => $product, 'user_id' => $user_id, 'text' => $result));
			}
	}
}