<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="20;URL='index.php'">
    <title>Fire Door (ประตูหนีไฟ)</title>
    <!-- icon -->
    <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/social-media-2-4/63/flame-512.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="test.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="https://cdn3.iconfinder.com/data/icons/social-media-2-4/63/flame-512.png" style="height: 50px;" alt="">
                    <span class="fs-4">&nbsp;&nbsp;Fire Door</span>
                </a>
            </div>
        </header>
        <?php

        $Date_time = date("Y-m-d");
        // ------------------------------------------------------------------ ชั้น 3 ------------------------------------------------------------------
        $result1 = pg_query("SELECT * from firedoor_status WHERE firedoor_status.floor = 'ชั้น 3' ORDER BY sid");
        $result11 = pg_query("SELECT * from firedoor WHERE firedoor.date = 'now()'");
        $row11 = pg_fetch_assoc($result11);
        echo "<div class='p-3 pb-md-4 mx-auto'><h1>ชั้น 3</h1></div>";
        echo "<div class='row row-cols-1 row-cols-md-5 text-center'>";
        while ($row1 = pg_fetch_assoc($result1)) {
            // echo json_encode($row);
            // echo $row11['id'];
            if ($row11 == null) {
                echo "<div class='col'>";
                echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                echo "<div class='card-header py-3 bg-success'>";
                echo "<h4 class='my-0 fw-normal'>" . $row1['sname'] . "</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<img id='img' src='firedoor.png'><br><br>";
                // echo "<form method='post' action='changeStatus.php'>";
                echo "<button type='submit'  class='w-100 btn btn-lg btn-success' >" . $row1['status'] . "</button>";
                // echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                if ($row1['status'] == 'on' && $row11['date'] ==  $Date_time) {
                    // echo "on<br>";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-danger'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row1['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<form method='post' action='changeStatus.php'>";
                    echo "<input type='hidden' name='name' value='" . $row1['sname'] . "'>";
                    echo "<input type='hidden' name='floor' value='" . $row1['floor'] . "'>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-danger' >" . $row1['status'] . "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else if ($row1['status'] == 'off' && $row11['date'] ==  $Date_time) {
                    // echo "off";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-success'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row1['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-success' >" . $row1['status'] . "</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";

        // ------------------------------------------------------------------ ชั้น 4 ------------------------------------------------------------------
        $result2 = pg_query("SELECT * from firedoor_status WHERE firedoor_status.floor = 'ชั้น 4' ORDER BY sid");
        $result22 = pg_query("SELECT * from firedoor WHERE firedoor.date = 'now()'");
        $row22 = pg_fetch_assoc($result22);
        echo "<div class='p-3 pb-md-4 mx-auto'><h1>ชั้น 4</h1></div>";
        echo "<div class='row row-cols-1 row-cols-md-5 text-center'>";
        while ($row2 = pg_fetch_assoc($result2)) {
            // echo json_encode($row);
            // echo $row['name'] . $row['status'];
            if ($row22 == null) {
                echo "<div class='col'>";
                echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                echo "<div class='card-header py-3 bg-success'>";
                echo "<h4 class='my-0 fw-normal'>" . $row2['sname'] . "</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<img id='img' src='firedoor.png'><br><br>";
                echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row2['status'] . "</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                if ($row2['status'] == 'on' && $row22['date'] ==  $Date_time) {
                    // echo "on<br>";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-danger'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row2['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<form method='post' action='changeStatus.php'>";
                    echo "<input type='hidden' name='name' value='" . $row2['sname'] . "'>";
                    echo "<input type='hidden' name='floor' value='" . $row2['floor'] . "'>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-danger' >" . $row2['status'] . "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else if ($row2['status'] == 'off' && $row22['date'] ==  $Date_time) {
                    // echo "off";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-success'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row2['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row2['status'] . "</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";

        // ------------------------------------------------------------------ ชั้น 5 ------------------------------------------------------------------
        $result3 = pg_query("SELECT * from firedoor_status WHERE firedoor_status.floor = 'ชั้น 4' ORDER BY sid");
        $result33 = pg_query("SELECT * from firedoor WHERE firedoor.date = 'now()'");
        $row33 = pg_fetch_assoc($result33);
        echo "<div class='p-3 pb-md-4 mx-auto'><h1>ชั้น 5</h1></div>";
        echo "<div class='row row-cols-1 row-cols-md-5 text-center'>";
        while ($row3 = pg_fetch_assoc($result3)) {
            // echo json_encode($row);
            // echo $row['name'] . $row['status'];
            if ($row22 == null) {
                echo "<div class='col'>";
                echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                echo "<div class='card-header py-3 bg-success'>";
                echo "<h4 class='my-0 fw-normal'>" . $row3['sname'] . "</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<img id='img' src='firedoor.png'><br><br>";
                echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row3['status'] . "</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                if ($row3['status'] == 'on' && $row33['date'] ==  $Date_time) {
                    // echo "on<br>";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-danger'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row3['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<form method='post' action='changeStatus.php'>";
                    echo "<input type='hidden' name='name' value='" . $row3['sname'] . "'>";
                    echo "<input type='hidden' name='floor' value='" . $row3['floor'] . "'>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-danger' >" . $row3['status'] . "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else if ($row3['status'] == 'off' && $row33['date'] ==  $Date_time) {
                    // echo "off";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-success'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row3['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row3['status'] . "</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";

        // ------------------------------------------------------------------ ชั้น 6 ------------------------------------------------------------------
        $result4 = pg_query("SELECT * from firedoor_status WHERE firedoor_status.floor = 'ชั้น 6' ORDER BY sid");
        $result44 = pg_query("SELECT * from firedoor WHERE firedoor.date = 'now()'");
        $row44 = pg_fetch_assoc($result44);
        echo "<div class='p-3 pb-md-4 mx-auto'><h1>ชั้น 6</h1></div>";
        echo "<div class='row row-cols-1 row-cols-md-5 text-center'>";
        while ($row4 = pg_fetch_assoc($result4)) {
            // echo json_encode($row);
            // echo $row['name'] . $row['status'];
            if ($row44 == null) {
                echo "<div class='col'>";
                echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                echo "<div class='card-header py-3 bg-success'>";
                echo "<h4 class='my-0 fw-normal'>" . $row4['sname'] . "</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<img id='img' src='firedoor.png'><br><br>";
                echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row4['status'] . "</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                if ($row4['status'] == 'on' && $row44['date'] ==  $Date_time) {
                    // echo "on<br>";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-danger'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row4['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<form method='post' action='changeStatus.php'>";
                    echo "<input type='hidden' name='name' value='" . $row4['sname'] . "'>";
                    echo "<input type='hidden' name='floor' value='" . $row4['floor'] . "'>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-danger' >" . $row4['status'] . "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else if ($row4['status'] == 'off' && $row44['date'] ==  $Date_time) {
                    // echo "off";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-success'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row4['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row4['status'] . "</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";

        // ------------------------------------------------------------------ ชั้น 7 ------------------------------------------------------------------
        $result5 = pg_query("SELECT * from firedoor_status WHERE firedoor_status.floor = 'ชั้น 7' ORDER BY sid");
        $result55 = pg_query("SELECT * from firedoor WHERE firedoor.date = 'now()'");
        $row55 = pg_fetch_assoc($result55);
        echo "<div class='p-3 pb-md-4 mx-auto'><h1>ชั้น 7</h1></div>";
        echo "<div class='row row-cols-1 row-cols-md-5 text-center'>";
        while ($row5 = pg_fetch_assoc($result5)) {
            // echo json_encode($row);
            // echo $row['name'] . $row['status'];
            if ($row55 == null) {
                echo "<div class='col'>";
                echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                echo "<div class='card-header py-3 bg-success'>";
                echo "<h4 class='my-0 fw-normal'>" . $row5['sname'] . "</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<img id='img' src='firedoor.png'><br><br>";
                echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row5['status'] . "</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                if ($row5['status'] == 'on' && $row55['date'] ==  $Date_time) {
                    // echo "on<br>";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-danger'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row5['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<form method='post' action='changeStatus.php'>";
                    echo "<input type='hidden' name='name' value='" . $row5['sname'] . "'>";
                    echo "<input type='hidden' name='floor' value='" . $row5['floor'] . "'>";
                    echo "<button type='submit' name='submit' class='w-100 btn btn-lg btn-danger' >" . $row5['status'] . "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else if ($row5['status'] == 'off' && $row55['date'] ==  $Date_time) {
                    // echo "off";
                    echo "<div class='col'>";
                    echo "<div class='card mb-4 rounded-3 shadow-sm'>";
                    echo "<div class='card-header py-3 bg-success'>";
                    echo "<h4 class='my-0 fw-normal'>" . $row5['sname'] . "</h4>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<img id='img' src='firedoor.png'><br><br>";
                    echo "<button type='button' id='change' class='w-100 btn btn-lg btn-success'>" . $row5['status'] . "</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";
        ?>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script>
    function myFunction() {
        alert("Hello World");
    }
</script>