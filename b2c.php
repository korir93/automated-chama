<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
}
else {
header("location: login.php");
exit();
}

if (isset($_POST['btnWithdraw'])) {
$number = $_POST['number'];
$amount = $_POST['ammount'];
$name = $_POST['name'];
}

$url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer BEATM7drQAX2XDTC2AOpcECGMAOx')); //setting custom header

$curl_post_data = array(
  //Fill in the request parameters with valid values
  'InitiatorName' => 'safaricom.26',
  'SecurityCredential' => 'deUPoDW9QPpSV+HejBcfsU6u4kZ1MNJwSF5/asj8+Ceip/jATVqG43d4IxGCUqnQDhmqCxkiKMmWKnuWLbEZeIIF1l71cBIfMAod7UxXl4vcnMoM0pMZ/n1WyzxRFAQSD0GXwOW20MtWdyfbfEfMUl7Zs51X4k3EqI4M9w6yQ+6Jy5sCQH8M/3s8Ly6P1dv12J/k443PHgX7Y/iJuH6S/ihiBzjJm4LdFPmvFTMHB0s90mYNRhlYVORiiS0pKSHBpGI9EfHDq5W/1HuHLpo3pIRxEtZ8gMKcPHnCauU3AmvGRtxzYq/rCZSjbFsvXn1UT1Vamw0CsQKczPLXDKm/KA==',
  'CommandID' => 'SalaryPayment',
  'Amount' => '500',
  'PartyA' => '603020',
  'PartyB' => '254708649931',
  'Remarks' => 'Congratulations! Your turn to get merry-go-round.',
  'QueueTimeOutURL' => 'http://mychama.findpata.com',
  'ResultURL' => 'http://mychama.findpata.com',
  'Occasion' => 'MyChama Merry-Go-Round'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
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
$MERCHANT_TRANSACTION_ID = "MJ3".generateRandomString();
$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result=mysqli_query($conn,"select * from total where chama='".$session."'");
$row=mysqli_fetch_assoc($result);
$mytotal=$row['amount'];
if ($amount>$mytotal) {
echo "<script>window.alert('Group balance is insufficient!);</script>";
header("refresh:0.1; url=withdraw.php");
exit();
}
$newtotal=$mytotal-$amount;
mysqli_query($conn,"insert into withdrawals(trans_id,chama,item_name,payment_gross,payment_status,mobile,name) values ('".$MERCHANT_TRANSACTION_ID."','".$session."','".$_POST['item_name']."', '".$amount."','Complete','".$number."','".$name."')") or die(mysqli_error($conn));
mysqli_query($conn,"update total set amount = '".$newtotal."'") or die(mysqli_error($conn));
mysqli_close($conn);
echo "<script>window.alert('Money send to member's mpesa);</script>";
echo "<br><br><br><center>You will be redirected in <span id='counter'>10</span> seconds</center>";
?>
<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = '<?php echo "withdraw.php"; ?>';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
</script>