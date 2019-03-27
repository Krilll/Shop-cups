<?
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 'guest';
}
?>

<table class="table" >
	<tr>
		<th>Что</th>
		<th>Вижу Вас как на яву</th>
		<th>Сколько</th>
		<th>Почём</th>
		<th>Итого (руб)</th>
		<th>Убрать</th>
	</tr>
	<?
		$order = 0;
		if (isset($products)) {
			foreach ($products as $product) {
				echo "<tr id = 'productU_" . $product["idB"]."'>
				<td>" . $product["name"] . "</td>
				<td> <img src=". DIR_SMALL . $product["image"]." alt=". $product[name]." </td>
				<td id = 'countU_".$product["idB"]."'>" . $product["count"] . "</td>
				<td>" . $product["price"] . "</td>
				<td id = 'priceU_" . $product["idB"]."'>" . $product["count"] * $product["price"] . "</td>
				<td>
					<button class='button delete_basket' id= '".$product["idB"]."'  type='submit'>Удалить</button></td>
				</td>
				</tr>";
				$order += $product["count"] * $product["price"];	
			}
		}
		if(!$products){
			echo "<tr>
				<td>" . '-' . "</td>
				<td>" . '-' . "</td>
				<td>" . '-' . "</td>
				<td>" . '-' . "</td>
				<td>" . '-' . "</td>
				<td>" . '-' . "</td>
				</tr>";
		}
	?>
</table>
<br>

<h2 class="totat_h2" id="total"><?= "Итого: " . $order . " рублей"?></h2> 
<br>
<?=$information_guest?>

<?if ($user_id!='guest') {  ?>
	<button id="basket_<?=$user_id?>" class="button add_basket" type="submit">Оформить заказ</button> 
<?} 