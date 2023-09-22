<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require "connect.php";

if (isset($_POST['book']))
{
        $tanggalTransaksi = date("Y/m/d");
        
        // $quantity1=$_POST['quantity1'];
        // $quantity2=$_POST['quantity2'];
        // $quantity3=$_POST['quantity3'];
        // $quantity4=$_POST['quantity4'];
        // $quantity5=$_POST['quantity5'];
        // $quantity6=$_POST['quantity6'];
        // $quantity7=$_POST['quantity7'];
        // $quantity8=$_POST['quantity8'];
        // $quantity9=$_POST['quantity9'];
        // $quantity10=$_POST['quantity10'];

        // $sql1=mysqli_query($con,"SELECT * FROM wisata WHERE id_wisata =".$quantity1);
        // $row1= mysqli_fetch_assoc($sql1);
        // $harga1 = $row1['harga'];
        // $amount1 = $harga1 * $quantity1;

        // $sql2=mysqli_query($con,"SELECT * FROM wisata".$quantity2);
        // $row2= mysqli_fetch_assoc($sql2);
        // $harga2 = $row2['harga'];
        // $amount2 = $harga2 * $quantity2;

        $quantities = [
            $_POST['quantity1'],
            $_POST['quantity2'],
            $_POST['quantity3'],
            $_POST['quantity4'],
            $_POST['quantity5'],
            $_POST['quantity6'],
            $_POST['quantity7'],
            $_POST['quantity8'],
            $_POST['quantity9'],
            $_POST['quantity10'],
          ];
          
          $total_amount = 0;
          
          foreach ($quantities as $quantity) {
            $sql = "SELECT * FROM wisata WHERE id_wisata = $quantity";
            $result = mysqli_query($con, $sql);
          
            if ($result) {
              $row = mysqli_fetch_assoc($result);
              $harga = $row['harga'];
              $amount = $harga * $quantity;
          
              $total_amount += $amount;
            }
          }



        


        $idMember= mysqli_insert_id($con);

        $amountQuantity1 =$_POST['quantity'] ;
        $detail = $_POST['detail'];
       
        $nights = dateDiffInDays($inDate, $outDate);
        $hargaBreakfast = 0;
        $hargaRoom = 0;
        $subTotal = 0;
        $amount = 0;
        $pajak = 0;
        $total = 0;
        $status = 0;
        $cekBreakfast = -1;
        $cekSmoking = -1;  
        $sdh_bayar = 0;
        $blm_bayar = 0;  
        if(isset($_POST['breakfastCheckbox'])){
            $cekBreakfast = 1;
            $hargaBreakfast = 100000;
        }
        else{
            $cekBreakfast = 0;
        }
        if(isset($_POST['smokingCheckbox'])){
            $cekSmoking = 1;
        }
        else {
            $cekSmoking = 0;
        }
        if ($roomType == "R001"){
            $hargaRoom = 500000;
        }
        if ($roomType == "R002"){
            $hargaRoom = 500000;
        }
        if ($roomType == "R003"){
            $hargaRoom = 1100000;
        }
    
        $amount = $nights * $quantity * $hargaRoom;
        $subTotal = $nights * $quantity * $hargaRoom + $hargaBreakfast * $quantity * $nights;
        $pajak = $subTotal * 10 / 100;
        $total = $subTotal + $pajak;
        $blm_bayar = $total;
        $edit = $tanggalTransaksi;

        $sql=mysqli_query($con,"INSERT INTO member values(null, '$first', '$last', '$nomor','$email','$country') ");
        $idMember= mysqli_insert_id($con);
        $sql1="insert into transaksi values(null, '$tanggalTransaksi','$subTotal', '$pajak', '$total', '$status',$idMember, '$edit', null)";
        // $query=mysqli_query($con,$sql1);
        if(mysqli_query($con, $sql1)){
        $id_transaksi= mysqli_insert_id($con);
        // $id_transaksi = "SELECT LAST_INSERT_ID()";
        $sql2="insert into detail_transaksi values(null, '$inDate','$outDate', $nights, $quantity, $hargaRoom, $amount, '$detail', '$roomType', $id_transaksi, $cekBreakfast,$cekSmoking, $sdh_bayar, $blm_bayar)";
        $query=mysqli_query($con,$sql2);


        header("Location: payment.php?status4=0&id_transaksi=".$id_transaksi);
        }
    }
    else{
        if($roomType == 'R001'){
            echo("<script LANGUAGE = 'JavaScript'>
            // window.alert('Pengisian Form Booking Belum Lengkap');
            window.location.href = 'home.php?status1=0';
            </script>");
            }
            else if($roomType == 'R002'){
                echo("<script LANGUAGE = 'JavaScript'>
                // window.alert('Pengisian Form Booking Belum Lengkap');
                window.location.href = 'home.php?status1=0';
                </script>");
                }
            if($roomType == 'R003'){
                echo("<script LANGUAGE = 'JavaScript'>
                // window.alert('Pengisian Form Booking Belum Lengkap');
                window.location.href = 'home.php?status1=0';
                exit;
                </script>");
                }
    }
?>
