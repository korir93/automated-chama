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

$nos=$_GET["mob"];
$number="254".$nos;
$ammount=$_GET["amt"];
$back=$_GET["bck"];
$lid=$_GET['id'];
$chama=$_GET['chm'];
$name=$_GET['nme'];
$retd=$_GET['ret'];
$stat=$_GET['tru'];

if ($stat == "paid") {
    echo "<script>window.alert('You already paid your loan!');</script>";
    header("refresh:0.1; url=../member/loans.php");
    exit();
}
elseif ($stat == "new") {
    echo "<script>window.alert('Your loan is not yet approved. Please wait!');</script>";
    header("refresh:0.1; url=../member/loans.php");
    exit();   
}

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

$conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result2 = mysqli_query($conn,'select * from mychama_user_loans where id = "'.$lid.'"') or die(mysqli_error($conn));
while ($row2=mysqli_fetch_assoc($result2)) {
    $mydate=$row2['return_date'];
    $amounts=$row2['amount'];
}
date_default_timezone_set('Africa/Nairobi');
$today = date('Y-m-d H:i:s');
$final = 0;

$results = mysqli_query($conn,'select * from mychama_loans where chama = "'.$chama.'"') or die(mysqli_error($conn));
while ($rows=mysqli_fetch_assoc($results)) {
    $fine=$rows['fine'];
}

if ($today > $mydate) {
    $final=$amounts+$fine;
    if ($ammount<$final) {
        echo "<script>window.alert('Your payment is late! We added $fine as fine');</script>";
        mysqli_query($conn,"insert into mychama_fines(trans_id,chama,item_name,payment_gross,mobile,name) values ('$MERCHANT_TRANSACTION_ID','$chama','Loan ID ".$lid."', '$final','$number','$name')") or die(mysqli_error($conn));
        $ammount = $final;
    }
}

$action=1;
if($action=1)
{
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"your loan, ID ".$lid,$ammount,$number,$ip);
echo"<br><br>";

mysqli_query($conn,"insert into payments(trans_id,chama,item_name,payment_gross,payment_status,mobile,name) values ('$MERCHANT_TRANSACTION_ID','".$chama."','Loan ID ".$lid."', '".$ammount."','Complete','".$number."','".$name."')") or die(mysqli_error($conn));
$result5 = mysqli_query($conn,'select * from payments where chama = "'.$chama.'"') or die(mysqli_error($conn));
$total=0;
while ($row5=mysqli_fetch_assoc($result5)) {
    $total+=$row5['payment_gross'];
}
mysqli_query($conn,"update total set amount = '".$total."' where chama='".$chama."'") or die(mysqli_error($conn));
mysqli_close($conn);
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
            location.href = '<?php echo "../member/".$back; ?>';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
</script>