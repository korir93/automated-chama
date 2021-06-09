<?php

$recipients = $_POST['txtNumber'];
$message = $_POST['txtMessage'];
require_once('AfricasTalkingGateway.php');
$gateway    = new AfricasTalkingGateway("findpata", "427e7b2ea5cc866df675db45c87d18ce0a36e75aeb1b5bf6e0c4af6394b1b1fc");
try 
{ 
  $results = $gateway->sendMessage($recipients, 'fro ronaa ,, chair ... '.$message);          
  foreach($results as $result) {
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
  echo "<br><br><br><center>You will be redirected in <span id='counter'>10</span> seconds</center>"; 
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
?>
<script type="text/javascript">
  function countdown() {
      var i = document.getElementById('counter');
      if (parseInt(i.innerHTML)<=0) {
          location.href = 'message.php';
      }
      i.innerHTML = parseInt(i.innerHTML)-1;
  }
  setInterval(function(){ countdown(); },1000);
</script>