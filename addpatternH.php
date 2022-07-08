<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title> 
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <!-- STYLESHEET -->  
    <link rel="stylesheet" href="./addeq.css">

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
                <a href="./equipments.php" class="active">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme.html">
                    <span class="material-icons-outlined">color_lens</span>
                    <h3>Themes</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report</span>
                    <h3>Reports</h3>
                </a>
                <a href="./addeq.html">
                    <span class="material-icons-sharp">add_circle</span>
                    <h3>Add Products</h3>
                </a>
                <a href="./login.html">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log Out</h3>
                </a>
                
            </div>
        </aside>
        <main>
            <h1>Pattern</h1>
            
                <p class="greeting">Go have a look at the </p>
            
            <div class="insights">
                <div class="device">
                <form action = "addpattern.php" method="post">
                    <div>
                        <label for="Name" class="text-muted">Please input your pattern name <br></label>
                        <input type="text" id="Name" name="Name" required="" style="font-size:20px;">
                    </div>
                    <?php
                        $FamilyId = 123;////////////////////////////////////////
                        $ID = 1;        ////////////////////////////////////////
                        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                        $mysqli = require __DIR__ . "/database.php";
        
                        $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
                        $row = $result->fetch_assoc();
                            
                        switch($row["Kind"]) {
                            case "router":
                                echo "
                                <div>
                                <label for='switch' class='text-muted'><br>Choose your equipment switch<br></label><br>
                                    <input type='checkbox' name='checkbox[]' value=1 style='-webkit-appearance: checkbox'>WIFI<br>
                                    <input type='checkbox' name='checkbox[]' value=2 style = '-webkit-appearance: checkbox'>Accerelator<br>
                                    <input type='checkbox' name='checkbox[]' value=3 style = '-webkit-appearance: checkbox'>Light<br>
                                </div>";
                                break;
                                case "televison":
                                    echo "
                                    <div>
                                    <label for='switch' class='text-muted'><br>Choose your equipment switch<br></label><br>
                                        <input type='checkbox' name='checkbox[]' value=1 style='-webkit-appearance: checkbox'>Power<br>
                       
                                    </div>";
                                    break;
                                case "lamp":
                                    echo "
                                    <div>
                                    <label for='switch' class='text-muted'><br>Choose your equipment switch<br></label><br>
                                        <input type='checkbox' name='checkbox[]' value=1 style='-webkit-appearance: checkbox'Normal<br>
                                        <input type='checkbox' name='checkbox[]' value=2 style = '-webkit-appearance: checkbox'>Bright<br>
                                        <input type='checkbox' name='checkbox[]' value=3 style = '-webkit-appearance: checkbox'>Dark<br>
                                    </div>";
                                    break;
                                case "curtain":
                                    echo "
                                    <div>
                                    <label for='switch' class='text-muted'><br>Choose your equipment switch<br></label><br>
                                        <input type='checkbox' name='checkbox[]' value=1 style='-webkit-appearance: checkbox'>thin<br>
                                        <input type='checkbox' name='checkbox[]' value=2 style = '-webkit-appearance: checkbox'>thick<br>
    
                                    </div>";
                                    break;
                                case "fan":
                                    echo "
                                    <div>
                                    <label for='switch' class='text-muted'><br>Choose your equipment switch<br></label><br>
                                        <input type='checkbox' name='checkbox[]' value=1 style='-webkit-appearance: checkbox'>rotate<br>
                                        <input type='checkbox' name='checkbox[]' value=2 style = '-webkit-appearance: checkbox'>normal<br>
                                        <input type='checkbox' name='checkbox[]' value=3 style = '-webkit-appearance: checkbox'>weak<br>
                                    </div>";
                                    break;
                            }
                        echo '<button>Submit</button>'
                    ?>
                    </div>
                </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>