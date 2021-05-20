<?php
$token = "e1WQicms4zOj893hByCVgEVlEEN2l39iZRxJ4ZoFv6d";

/*echo $token;

*/
/*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt =  $token;
fwrite($myfile, $txt);
fclose($myfile);*/

/*exit();
*/

$str = $message_details;
$str = $str . "ตรวจสอบการลงเวลาการทำงานล่วงเวลาได้ที่ https://s60.clib.psu.ac.th/ot/";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://notify-api.line.me/api/notify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "message=".$str,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$token,
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL ERROR #:". $err;
}
else {
  echo $response;
}
?>
