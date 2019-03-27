<?
require_once ('Admin.php');

if (isset($_GET['delete_id'])) {
		$id = $_GET['delete_id'];
		$admin_object = new Admin();
		$admin_object->deleteItem($id);
}

if (isset($_GET['work_id'])) {
		$id = $_GET['work_id'];
		$admin_object = new Admin();
		$admin_object->workItem($id);
}

if (isset($_GET['sent_id'])) {
		$id = $_GET['sent_id'];
		$admin_object = new Admin();
		$admin_object->sendItem($id);
}
?>