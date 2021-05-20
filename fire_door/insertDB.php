<?php
include('config.php');
// define('LINE_API', "https://notify-api.line.me/api/notify");

$json = file_get_contents('php://input');
$data = json_decode($json);  //ตัวแปรที่รับค่าจาก node

// $sToken = "LCMMcHH4Zms0GKR2WjM8AhKEVBVvx4tz9JiLLUKwk6C"; // tester 
// $sToken = "xMptezEypjGljKsCWIe4YkayWdmWihQCp2y7y8oDZQ0" //tester3

// --------------------------------------------------------------------- line notify ---------------------------------------------------------------------
$token = "LCMMcHH4Zms0GKR2WjM8AhKEVBVvx4tz9JiLLUKwk6C";

/*echo $token;

*/
/*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt =  $token;
fwrite($myfile, $txt);
fclose($myfile);*/

/*exit();
*/
// echo "-----------------------------------";
$str = $message_details;
$str = $str . "ตรวจสอบการลงเวลาการทำงานล่วงเวลาได้ที่https://s60.clib.psu.ac.th/ot/";
$curl = curl_init();
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt_array($curl, array(
	CURLOPT_URL => "http://notify-api.line.me/api/notify",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "message=" . $str,
	CURLOPT_HTTPHEADER => array(
		"Authorization: Bearer " . $token,
		"Cache-Control: no-cache",
		"Content-Type: application/x-www-form-urlencoded"
	),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL ERROR #:" . $err;
} else {
	echo $response;
}


// --------------------------------------------------------------------- line notify ---------------------------------------------------------------------

$Date_time = date("Y-m-d");


if ($data->ปลื้ม) {
	$result = pg_query("INSERT INTO firedoor (name,floor,date,time) VALUES ('$data->ปลื้ม','ชั้น 3', '$Date_time',now())");
	$sql3 = "UPDATE firedoor_status  SET  
            status='on'
            WHERE (sname = 'ประตูหนีไฟ 1' and floor = 'ชั้น 3')";
	$sql3result = pg_query($conn, $sql3);
}

if ($data->ต้น) {
	$result = pg_query("INSERT INTO firedoor (name,floor,date,time) VALUES ('$data->ต้น','ชั้น 3', '$Date_time',now())");
	$sql3 = "UPDATE firedoor_status  SET  
            status='on'
            WHERE (sname = 'ประตูหนีไฟ 2' and floor = 'ชั้น 3')";
	$sql3result = pg_query($conn, $sql3);
}
?>