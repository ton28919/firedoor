<?php
    include('config.php');

    $json = file_get_contents('php://input');
    $data = json_decode($json);  //ตัวแปรที่รับค่าจาก node
    if($data->ปลื้ม)
        $result = pg_query("INSERT INTO firedoor (name,date) VALUES ('$data->ปลื้ม',now())");
    if($data->ต้น)
        $result1 = pg_query("INSERT INTO firedoor (name,date) VALUES ('$data->ต้น',now())");
?>