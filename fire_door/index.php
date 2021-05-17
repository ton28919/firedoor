<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire Door (ประตูหนีไฟ)</title>
</head>

<body>
    <?php
    $Date_time = date("Y-m-d");
    $result = pg_query("select * from firedoor");
    $row = pg_fetch_row($result);
    $dt = new DateTime($row[2]);
    $date = $dt->format('Y-m-d');

    if($date == $Date_time){
        echo $date;
        
    }



    
    ?>
</body>

</html>