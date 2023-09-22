<?php

require "connect.php";
echo("<script LANGUAGE = 'JavaScript'>
window.alert('1');
</script>");
if (isset($_POST['save'])) {
    echo("<script LANGUAGE = 'JavaScript'>
window.alert('2');
</script>");
$tgl=  $_POST['tgl'];
   $q1=  $_POST['q1'];
   $q2=$_POST['q2'];
   $q3=$_POST['q3'];
   $q4=$_POST['q4'];
   $q5=$_POST['q5'];
   $q6=$_POST['q6'];
   $q7=$_POST['q7'];
   $q8=$_POST['q8'];
   $q9=$_POST['q9'];
   $q10=$_POST['q10'];
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];

    $sql = mysqli_query($con, "SELECT * FROM user where email='$email'");

    if (mysqli_num_rows($sql) > 0) {
        header('location: user.php?status=0');
    } else {
        $sql2 = "INSERT INTO user VALUES (null, '$nama', '$email', '$nomor')";
        $query = mysqli_query($con, $sql2);
        header("Location: payment.php?tgl=${tgl}&q1=${q1}&q2=${q2}&q3=${q3}&q4=${q4}&q5=${q5}&q6=${q6}&q7=${q7}&q8=${q8}&q9=${q9}&q10=${q10}");
        }
    }

?>

