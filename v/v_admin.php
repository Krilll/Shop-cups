<table class="table" >
	<tr>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Телефон</th> 
		<th>Заказ</th>
		<th>Количество</th>
		<th>Цена (руб) </th> 
		<th>Оформление</th>
		<th>Отправка</th>
		<th>Удаление</th>
	</tr>
	<?php
		//$order = 0;
		//if (isset($products)) {
		foreach ($products as $product) {
			echo "<tr id = 'product_" . $product["idB"]."'>
			<td>" . $product["nameU"] . "</td>
			<td>" . $product["lastName"] . "</td>
			<td>" . $product["telephone"] . "</td>
			<td>" . $product["name"] . "</td>
			<td id = 'count_".$product["idB"]."'>" . $product["count"] . "</td>
			<td id = 'price_" . $product["idB"]."'>" . $product["count"] * $product["price"]. "</td>
			<td id = 'work_".$product["idB"]."'>";
			if($product["work"] == 1) {
				echo "Оформлен";
			} else { 
				echo "<button class='button work_admin' id= '".$product["idB"]."'  type='submit'>Оформить</button>";
			} 
			echo "</td>
			<td id = 'sent_".$product["idB"]."'>";
			if($product["sent"] == 1) {
				echo "Отправлен";
			} else { 
				echo "<button class='button sent_admin' id= '".$product["idB"]."'  type='submit'>Отправить</button>";
			} 
			echo "</td>
			<td>
			<button class='button delete_admin' id= '".$product["idB"]."'  type='submit'>Удалить</button></td>
			</td>
			
			</tr>";
			//<button class='button' id='delete_admin' type='submit'>Удалить</button></td>
				//$order += $product["count"] * $product["price"];
				///*<form method='post' id='delete_admin'>
				//<input type='hidden' name='order' value='" . $product["idB"] . "'>
				//<input type='submit' name='submit' class='button' value='Удалить'>
				//</form> */
		}
		//}
	?>
</table>
<br>
<!--<h2><?//= "Итоговая сумма заказов: " . $order . " USD"?></h2> -->
