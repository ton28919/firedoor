<?php
include('config.php');

$json = file_get_contents('php://input');
$data = json_decode($json);  //ตัวแปรที่รับค่าจาก node

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");

$sToken = "LCMMcHH4Zms0GKR2WjM8AhKEVBVvx4tz9JiLLUKwk6C";
$sMessage = "มีรายการสั่งซื้อเข้าจ้า....";


$chOne = curl_init();
curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($chOne, CURLOPT_POST, 1);
curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($chOne);

//Result error 
if (curl_error($chOne)) {
    echo 'error:' . curl_error($chOne);
} else {
    $result_ = json_decode($result, true);
    echo "status : " . $result_['status'];
    echo "message : " . $result_['message'];
}
curl_close($chOne);



$Date_time = date("Y-m-d");
echo "$-Date_time " . $Date_time;




if ($data->ปลื้ม) {
    $result = pg_query("INSERT INTO firedoor (name,floor,date,time) VALUES ('$data->ปลื้ม','ชั้น 3', '$Date_time',now())");
    $sql3 = "UPDATE firedoor_status  SET  
            status='on'
            WHERE (sname = 'ประตูหนีไฟ 1' and floor = 'ชั้น 7')";
    $sql3result = pg_query($conn, $sql3);
}

if ($data->ต้น) {
    $result = pg_query("INSERT INTO firedoor (name,floor,date,time) VALUES ('$data->ต้น','ชั้น 3', '$Date_time',now())");
    $sql3 = "UPDATE firedoor_status  SET  
            status='on'
            WHERE (sname = 'ประตูหนีไฟ 2' and floor = 'ชั้น 3')";
    $sql3result = pg_query($conn, $sql3);
}