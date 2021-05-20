<?php
        include('config.php');
        $name = @$_POST['name'];
        $floor = @$_POST['floor'];

        if (isset($_POST['submit'])) {
                $sql3 = "UPDATE firedoor_status  SET  
                status='off'
                WHERE (sname = '$name' and floor = '$floor')";
                $sql3result = pg_query($conn, $sql3);
                if ($sql3result) {
                        echo "<script type='text/javascript'>";

                        echo "alert('แก้ไขสถานะประตูหนีไฟ สำเร็จ!!');";
                        echo "window.window.location = 'index.php';";
                        echo "</script>";
                } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('ผิดพลาด กรุณาแก้ไขสถานะประตูหนีไฟอีกครั้ง!!');";
                        echo "window.window.location = 'index.php';";
                        echo "</script>";
                }
        }
?>