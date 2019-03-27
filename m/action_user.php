<?

require_once ('Basket.php');

if (isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	$admin_object = new Basket();
	$admin_object->deleteItem($id);
}

if (isset($_GET['add'])) {	
	$id = $_GET['addIdP'];
	$user = $_GET['addIdU'];
	$admin_object = new Basket();
	$admin_object->addItem($id, $user);
}

if (isset($_GET['check_id'])) {
	$id = $_GET['check_id'];
	$admin_object = new Basket();
	$admin_object->checkItems($id);
}

if (isset($_GET['guest_name'])) {
	$name = $_GET['guest_name'];
	$lastName = $_GET['guest_lastName'];
	$telephone = $_GET['guest_telephone'];
	$admin_object = new Basket();
	$admin_object->checkGuestItems($name, $lastName, $telephone);
}


?>