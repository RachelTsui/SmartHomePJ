<?php
    $con=mysqli_connect("localhost","root","123456","smartHouse");
    // 检测连接
    if (mysqli_connect_errno()){
        echo "连接失败: " . mysqli_connect_error();
        
    }
    else if(isset($_POST)){
        $sql = "INSERT INTO `reports` (`reports_id`, `report_device`, `report_description`, `report_time`) VALUES (null, 'Test_device', 'need to be repaired', '2022-8-3')";
        $results = mysqli_query($con, $sql);
                    //var_dump($result);
        echo "<script>alert('新增成功');window.location.href='report.php';</script>";
        }
    
?>