<?php
include('config.php');
// include('insertDB.php');
// $json = file_get_contents('php://input');
// $data = json_decode($json);  //ตัวแปรที่รับค่าจาก node

// $Date_time = date("Y-m-d");
// echo "$-Date_time " . $Date_time;
$name = $_POST['name'];
$floor = $_POST['floor']; 

if (isset($_POST['submit'])) {
    // $result = pg_query("INSERT INTO firedoor (name,floor,date,time) VALUES ('$data->ปลื้ม','ชั้น 3', '$Date_time',now())");
    $sql3 = "UPDATE firedoor_status  SET  
            status='off'
            WHERE (sname = '$name' and floor = '$floor')";
    $sql3result = pg_query($conn, $sql3);
    if($sql3result){
        echo "<script type='text/javascript'>";
        
        echo "alert('Success');";
        echo "window.window.location = 'index.php';";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Change Status again!!');";
        echo "window.window.location = 'index.php';";
        echo "</script>";
}
}
?>