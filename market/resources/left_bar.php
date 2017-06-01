<!-- Left bar Start -->
<?php
	echo '<div class="cart-view-table-left" id="view-cart" style="margin:100px auto;">';
	echo '<h4>Sort</h4>';

	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	echo '<tr>';
	echo '<td><a href="product_fivem.php"> Five most visited items </a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><a href="product_fivep.php"> Five previous visited items </a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><a href="product_fivet.php"> Five top rating items </a></td>';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td><a href="pricesort.php?type=desc"> Price High to Low </a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><a href="pricesort.php?type=asc"> Price Low to High </a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><a href="ratingsort.php?type=desc"> Rating High to Low </a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><a href="ratingsort.php?type=asc"> Rating Low to High </a></td>';
	echo '</tr>';
	
	echo '</tbody>';
	echo '</table>';

	echo '</div>';
?>
<!-- Left bar End -->