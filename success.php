<?php

$item_number = $_GET['item_number']; 

$txn_id = $_GET['Trasaction_ID']; 

$payment_gross = $_GET['AMT']; 

$currency_code = $_GET['CURRENCY_CODE']; 

$payment_status = $_GET['PAYMENT_STATUS']; 

//Insert tansaction data into the database 

$insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')"); 

$last_insert_id = $db->insert_id;
?> 

<h1>Your payment has been successful.</h1> 

    <h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1> 

<?php 

 
?> 

<h1>Your payment has failed.</h1> 

<?php 
 

?>