<?php
	if (isset($_POST['btnCode'])) {
		$mail = $_POST['identity'];
		$phone = $_POST['identity2'];

		function generateRandomString() {
		    $length = 10;
		    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		$newpass = generateRandomString();
        require_once('AfricasTalkingGateway.php');
        $gateway    = new AfricasTalkingGateway("findpata", "427e7b2ea5cc866df675db45c87d18ce0a36e75aeb1b5bf6e0c4af6394b1b1fc");
        try 
        {	
        	$conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
        	/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
        	mysqli_query($conn,'update mychama_members set password="'.$newpass.'" where username = "'.$mail.'"') or die(mysqli_error($conn));
			mysqli_query($conn,'update mychama_users set password="'.$newpass.'" where email = "'.$mail.'"') or die(mysqli_error($conn));
          $results = $gateway->sendMessage($phone, $newpass." is your reset password");
          foreach($results as $result) {
          	echo "<script>window.alert('Password reset success!');</script>";
            echo " <br><br> Number: ".$result->number;
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
	}
	mysqli_close($conn);
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