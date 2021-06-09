<?php
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $session = $_SESSION['username'];
    }
    else {
        header("location: login.php");
    }

    if (isset($_POST['btnDeposit'])) {
        $query = array();
        $query['cmd'] = '_xclick';
        $query['business'] = 'kinix1006@gmail.com';
        $query['amount'] = $_POST['amount'];
        $query['item_name'] = $_POST['item_name'];
        $query['return'] = 'http://www.sandbox.paypal.com';
        $query['cancel_return'] = 'http://www.sandbox.paypal.com';

        $item_name = $_POST["item_name"];
        $amount = $_POST["amount"];

        $conn = mysqli_connect('localhost','root','','mychama');
        /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
        $result = mysqli_query($conn,'select * from payments') or die(mysqli_error($conn));
        while ($row=mysqli_fetch_assoc($result)){
            $id=$row['txn_id'];
        }
        $newid=$id+1;
        mysqli_query($conn,"insert into payments(item_number,txn_id,payment_gross,currency_code,payment_status,payer) values ('$item_name','$newid','$amount', 'USD','Complete','$session')") or die(mysqli_error($conn));

        header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?'.http_build_query($query));
        mysqli_close($conn);
        exit(0);
    }
?>