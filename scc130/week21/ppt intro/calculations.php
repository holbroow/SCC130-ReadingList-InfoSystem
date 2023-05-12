<?php
echo "The number you have entered = ";
echo "<b>{$_POST['quantity']}</b>";
echo nl2br("\n");

$total = ($_POST["quantity"] * $_POST["price"]) * ($_POST["taxrate"] + 1);
$total = number_format ($total, 2);
echo "Your are purchasing <b>{$_POST["quantity"]}</b> Items at a cost of
<b>£{$_POST["price"]}</b> each. With tax, the total is <b>£$total</b>.\n";
?>