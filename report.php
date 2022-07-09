<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title> 
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round"
      rel="stylesheet">
    <!-- STYLESHEET -->  
    <!-- <script src="./report.js"></script> -->
    <!-- <link rel="stylesheet" href="./addeq.css"> -->
    <link rel="stylesheet" href="./theme.css">
</head>
<body>
<div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/sharp_holiday_village_black_24dp.png">
                    <h2>IH<span class="danger">AC</span></h2>

                </div>
                <div class="close">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./index.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./equipments.php">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme_new.php">
                    <span class="material-icons-outlined">color_lens</span>
                    <h3>Themes</h3>
                </a>
                <a href="./message.php">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="./report.php">
                    <span class="material-icons-sharp">report</span>
                    <h3>Reports</h3>
                </a>
                <a href="./addeq.html">
                    <span class="material-icons-sharp">add_circle</span>
                    <h3>Add Products</h3>
                </a>
                <a href="./logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log Out</h3>
                </a>
                
            </div>
        </aside>
        <main>
            <h1>Reports</h1>
            
                <p class="greeting" style="color: gray; font-size: 20px;">This is your reports </p>
            
            <div class="insights" id="">
                <form action="buttontest.php" method="post">
                    <input id = "button" type="submit" value="test">
                </form>
                <?php
                $con=mysqli_connect("localhost","root","123456","smartHouse");
                // 检测连接
                if (mysqli_connect_errno()){
                echo "连接失败: " . mysqli_connect_error();
                }
                
                $report_result = mysqli_query($con, "SELECT * FROM reports ORDER BY reports_id DESC");
                $report_num    = mysqli_num_rows($report_result);
                $equip_result = mysqli_query($con, "SELECT * FROM equipment");
                $equip_num = mysqli_num_rows($equip_result);
                $i = 0;
                $j = 0;
                
                for ($j = 0; $j < $equip_num; $j++) {
                    $equip_result = mysqli_query($con, "SELECT * FROM equipment limit $j,1");
                    $row = $equip_result->fetch_assoc();
                    $time1_date = $row["Date"];
                    $nowdate_date = date("Y-m-d", time());
                    $subday = (strtotime($nowdate_date)-strtotime($time1_date))/86400;
                    $circle = $row["Cycle"];
                    if($subday>=$circle){
                        mysqli_query($con,"UPDATE `equipment` SET `Status`  = 'Emergency' WHERE ID ='". $row['ID']."'");
                        $sql = "INSERT INTO `reports` (`reports_id`, `report_device`, `report_description`, `report_time`) VALUES (null, '". $row['Name']."', 'need to be repaired', '". $nowdate_date."')";
                        $results = mysqli_query($con, $sql);
                    }
                    else{
                        mysqli_query($con,"UPDATE `equipment` SET `Status`  = 'Healthy' WHERE ID ='". $row['ID']."'");
                    }
                
                }
                for ($i = 0; $i < $report_num; $i++) {
                    $report_result = mysqli_query($con, "SELECT * FROM reports ORDER BY reports_id DESC limit $i,1");
                    $row = $report_result->fetch_assoc();
                    echo " 
                        <div>
                                $row[reports_id]
                                <br>
                                    <div style='font-weight:lighter'></div>
                                    report_device: $row[report_device]  
                                <br>
                                    report_description: $row[report_description]
                                <br>
                                <br>
                                    time: $row[report_time]
                                <br>
                        </div>
                        
                        ";
                }


                ?>
            </div>

            
        </main>
    </div>
</body>
</html>