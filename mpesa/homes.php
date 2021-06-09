<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
}
else {
header("location: login.php");
exit();
}

$send=1;

$number=$_GET["no"];
$ammount=$_GET["am"];
$back=$_GET["pa"];

if ($send=1) {

require_once('config/Constant.php');
require_once('lib/MpesaAPI.php');

$PAYBILL_NO = "898998";
$MERCHENTS_ID = $PAYBILL_NO;
function generateRandomString() {
    $length = 7;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$MERCHANT_TRANSACTION_ID = "MKC".generateRandomString();

//Get the server address for callback
$host=gethostname();
$ip = gethostbyname($host);

//$Password=Constant::generateHash();
$Password='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';
$mpesaclient=new MpesaAPI;

/**
 * Make payment
 */

$action=1;
if($action=1)
{
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"MyChama Merry-Go-Round",$ammount,$number,$ip);
echo"<br><br>";
if (isset($_POST['btnDeposit'])) {
$paidby = $_POST['payer'];
$item_name = $_POST["item_name"];

$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
mysqli_query($conn,"insert into payments(trans_id,chama,item_name,payment_gross,payment_status,mobile,name) values ('$MERCHANT_TRANSACTION_ID','$session','$item_name', '$ammount','Complete','$number','$paidby')") or die(mysqli_error($conn));
$result5 = mysqli_query($conn,'select * from payments where chama = "'.$session.'"') or die(mysqli_error($conn));
$total=0;
while ($row5=mysqli_fetch_assoc($result5)) {
    $total+=$row5['payment_gross'];
}
mysqli_query($conn,"update total set amount = '".$total."'") or die(mysqli_error($conn));
mysqli_close($conn);
}
echo "<script>window.alert('Transaction initiated. Check your mobile phone...');</script>";
echo "<br><br><br><center>You will be redirected in <span id='counter'>10</span> seconds</center>"; 
}

else
{
	echo json_encode("No operation selected");
}

}else{
   echo json_encode("No data sent here");
}
?>
<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = '<?php echo "../".$back; ?>';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
</script>