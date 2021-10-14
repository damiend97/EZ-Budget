<?php
 foreach($incomeNames as $i => $item) {
	 echo "<div class='element'>";

	 echo "<div class='col right'><i class='fas fa-times del-but iDel'></i></div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Name:</div>";
	 echo "<div class='col'>";
	 echo $incomeNames[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Amount:</div>";
	 echo "<div class='col'>";
	 echo $incomeAmounts[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "<div class='row'>";
	 echo "<div class='col'>Date:</div>";
	 echo "<div class='col'>";
	 echo $incomeDates[$i];
	 echo "</div>";
	 echo "</div>";

	 echo "</div>";
 }
?>