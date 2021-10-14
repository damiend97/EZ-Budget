<?php
 foreach($expenseNames as $i => $item) {
	 echo "<div class='element'>";

	 echo "<div class='col right'><i class='fas fa-times del-but eDel'></i></div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Name:</div>";
	 echo "<div class='col'>";
	 echo $expenseNames[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Amount:</div>";
	 echo "<div class='col'>";
	 echo $expenseAmounts[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Date:</div>";
	 echo "<div class='col'>";
	 echo $expenseDates[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "</div>";
 }
?>