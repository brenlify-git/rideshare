<?php
$amount = 2100;

$thousandCount = floor($amount / 1000); //2

$remainder = $amount % 1000; //100

if ($remainder > 0 && $remainder <= 999) {
    $thousandCount += 1;
    $thousandCount *= 20;
}
else{
    $thousandCount *= 20;
}

echo "<h1>Amount: $amount\n</h1> ";
echo "<h1>Thousand Count: $thousandCount\n</h1> ";

//  2100/1000 = 2.1
//                2

//  2100 - 2000 = 100


//  2100 % 1000
//  100


?>

