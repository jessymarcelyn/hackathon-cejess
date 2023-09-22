<?php
session_start();
require "connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="jquery-3.6.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <style>
      /* Your custom CSS styles */
      .plusminus {
          margin-top: 3%;
          height: 60%;
          width: 30%;
          display: flex;
          align-items: center;
          justify-content: center;
          background-color: #0D33EE;
          color: white;
          border-radius: 8px;
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      }

      .spanplusminus {
          width: 35%;
          text-align: center;
          font-size: 110%;
          cursor: pointer;
          user-select: none;
      }

      img {
          width: 20%;
          height: 20%;
      }

      body {
          box-sizing: border-box;
          overflow-x: hidden;
          width: 100%;
          height: 100%;
          margin: 0;
          padding: 0;
          background-color: #f7f8fa;
      }
  </style>


<form action="booking.php" method="post">
  <div class="wisata">
    <div class="container text-center">
      <div class="row align-items-start">

        <?php
        for ($i = 1; $i <= 10; $i++) {
          $sql = "SELECT * FROM wisata WHERE id_wisata = '$i'";
          $res1 = mysqli_query($con, $sql);

          if (!empty($res1)) {
            while ($row = mysqli_fetch_array($res1)) {
              ?>

              <div class="col-md-4">
                <div class="nama"><?= $row["nama"] ?></div>
                <input type="hidden" name="idQ<?= $i ?>" id="quantity<?= $i ?>">
                <div class="plusminus">
                  <span id="minus<?= $i ?>" class="spanplusminus">-</span>
                  <span id="num<?= $i ?>" class="spanplusminus">01</span>
                  <span id="plus<?= $i ?>" class="spanplusminus">+</span>
                </div>
              </div>

              <script>
                plus<?= $i ?> = document.getElementById("plus<?= $i ?>"),
                minus<?= $i ?> = document.getElementById("minus<?= $i ?>"),
                num<?= $i ?> = document.getElementById("num<?= $i ?>");
                let a<?= $i ?> = 1;
                document.getElementById("quantity<?= $i ?>").value = a<?= $i ?>;
                //Untuk menambah dan mengurangkan jumlah kamar yang akan dipesan
                plus<?= $i ?>.addEventListener("click", () => {
                  a<?= $i ?>++;
                  if (a<?= $i ?> < 10) {
                    document.getElementById("quantity<?= $i ?>").value = a<?= $i ?>;
                    a<?= $i ?> = "0" + a<?= $i ?>;
                    num<?= $i ?>.innerText = a<?= $i ?>;
                  } else {
                    document.getElementById("quantity<?= $i ?>").value = a<?= $i ?>;
                    num<?= $i ?>.innerText = a<?= $i ?>;
                  }
                });

                minus<?= $i ?>.addEventListener("click", () => {
                  if (a<?= $i ?> > 1) {
                    a<?= $i ?>--;
                    if (a<?= $i ?> < 10) {
                      document.getElementById("quantity<?= $i ?>").value = a<?= $i ?>;
                      a<?= $i ?> = "0" + a<?= $i ?>;
                      num<?= $i ?>.innerText = a<?= $i ?>;
                    } else {
                      document.getElementById("quantity<?= $i ?>").value = a<?= $i ?>;
                      num<?= $i ?>.innerText = a<?= $i ?>;
                    }
                  }
                });
              </script>

              <?php
            }
          }
        }
        ?>
        <input type="date" class="form-control" id="tgl">


      </div>
    </div>
  </div>

<button type="button" class="btn btn-secondary" onclick="detail1()" >Book</button>
<script>
   // Get today's date in the format YYYY-MM-DD
   let tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 2);
        let tomorrowFormatted = tomorrow.toISOString().split('T')[0];
        
        // Set the minimum attribute of the date input to today
        document.getElementById('tgl').setAttribute('min', tomorrowFormatted);
function detail1() {
  let tgl = document.getElementById("tgl").value;
  let a1 = document.getElementById("quantity1").value;
  let a2 = document.getElementById("quantity2").value;
  let a3 = document.getElementById("quantity3").value;
  let a4 = document.getElementById("quantity4").value;
  let a5 = document.getElementById("quantity5").value;
  let a6 = document.getElementById("quantity6").value;
  let a7 = document.getElementById("quantity7").value;
  let a8 = document.getElementById("quantity8").value;
  let a9 = document.getElementById("quantity9").value;
  let a10 = document.getElementById("quantity10").value;

  // Use backticks (`) for string interpolation
  location.href = `user.php?tgl=${tgl}&q1=${a1}&q2=${a2}&q3=${a3}&q4=${a4}&q5=${a5}&q6=${a6}&q7=${a7}&q8=${a8}&q9=${a9}&q10=${a10}`;
}
</script>
</form>