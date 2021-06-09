<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_members where username = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['name'];
    $phone=$row['mobile'];
    $chama=$row['chama'];
}
}

else {
header('location:../login.php');
}
$result3 = mysqli_query($conn,'select * from payments where payer = "'.$session.'" or payer = "'.$chama.'"') or die(mysqli_error($conn));
$total3=0;
while ($row3=mysqli_fetch_assoc($result3)){
    $id3=$row3['payment_gross'];
    $total3+=$id3;
}

$result2 = mysqli_query($conn,'select * from payments where payer = "'.$session.'"') or die(mysqli_error($conn));
$total2=0;
while ($row2=mysqli_fetch_assoc($result2)){
    $id2=$row2['payment_gross'];
    $total2+=$id2;
}

echo $chama."<br>";
echo $total3."<br>";
echo $total2."<br>";
echo $session."<br>";
?>