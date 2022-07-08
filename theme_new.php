<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title>
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./theme.css">

    <script src="./theme.js"></script>

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
                <a href="./index.html">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./equipments.html">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="#">
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
            <h1>Themes</h1>

            <p class="greeting" style="color: gray; font-size: 20px;">Please DIY your personal theme </p>

            <div class="insights" id>
                <div class="themepallete" style="font-size: 18px; width:800px">
                    <form action="theme.php" method="post">
                        <!-- <div>
                            <label for="theme_id">theme_id</label>
                            <input type="number" id="theme_id" name="theme_id">
                        </div> -->
                        <div>
                            <label for="theme_name">theme_name</label>
                            <input type="text" id="theme_name" name="theme_name">
                        </div>
                        <label for="device_select">device_select</label>
                        <select type="text" name="device_select" id="device_select" style="font-size:18px;">
                
                            <?php
                            session_start();
                            $mysqli = require __DIR__ . "/database.php";
                            $stmt = $mysqli->stmt_init();

                            $result = mysqli_query($mysqli, "SELECT * FROM equipment ORDER BY ID DESC");
                            $num    = mysqli_num_rows($result);
                            $i = 0;

                             for ($i = 0; $i < $num; $i++) {
                                $result = mysqli_query($mysqli, "SELECT * FROM equipment ORDER BY ID DESC limit $i,1");
                                $row = $result->fetch_assoc();
                                 $pattern = $row['Name'];
                                 echo " 
                                     <option name = 'pattern' onclick='checkPattern('$pattern')' value = '$row[Name]'>$row[Name]</option>
                                        ";

                             }
                            ?>
                        </select>
                       
                        <!-- <script>
                            var device_select = document.getElementById("device_select").value;
                            console.log(device_select);
                        </script> -->
                        
                        <div>
                            <label for="onTime" class="text-muted">Please select the preferable <b>ON</b> time</label>
                            <input type="time" id="onTime" name="onTime" required style="font-size:18px;">
                        </div>

                        <div>
                            <label for="offTime" class="text-muted">Please select the preferable <b>OFF</b> time</label>
                            <input type="time" id="offTime" name="offTime" required style="font-size:18px;">
                        </div>

                        <div>
                            <label for="theme_description">theme_description</label>
                            <input type="text" id="theme_description" name="theme_description">
                        </div>
                        <!-- <label for="place_select">place_select</label>
                        <select type="text" name="place_select" id="place_select" style="font-size:18px;">
                            <option value="Livingroom">Living Room</option>
                            <option value="Bathroom">Bathroom</option>
                            <option value="Kitchen">Kitchen</option>
                            <option value="Diningroom">Dining Room</option>
                            <option value="Balcony">Balcony</option>
                        </select> -->
                        <div>
                            <label for="theme_state">pattern</label>
                            <select type="text" name="pattern" id="pattern" style="font-size:18px;">
                                <!-- <option value="on">ON</option>
                                <option value="off">OFF</option> -->

                                

                            </select>
                        </div>
                        <div>
                            <label for="theme_state">theme_state</label>
                            <select type="text" name="theme_state" id="theme_state" style="font-size:18px;">
                                <option value="on">ON</option>
                                <option value="off">OFF</option>

                            </select>
                        </div>
                        <button>submit</button>

                    </form>
                </div>
                <!-- end of p4 -->
            </div>

            <div class="themepallete" id style="width:800px">
                <div class="message" style="font-size: 10px">

                    <p class="themetext" id="themeletter">Choose your themes</p>
                    <div>
                        <label for="theme_state">theme_state</label>
                        <form action='aaa.php' method='post'>
                            <select type="text" name="theme_state" id="theme_state" style="font-size:18px;">
                                <?php
                                $mysqli = require __DIR__ . "/database.php";
                                $stmt = $mysqli->stmt_init();

                                $result = mysqli_query($mysqli, "SELECT DISTINCT theme_name FROM theme ORDER BY theme_name DESC");
                                $num    = mysqli_num_rows($result);
                                $i = 0;
                                for ($i = 0; $i < $num; $i++) {
                                    $result = mysqli_query($mysqli, "SELECT DISTINCT theme_name FROM theme ORDER BY theme_name DESC limit $i,1");
                                    $row = $result->fetch_assoc();
                                    echo " 
                                    <option name = 'pattern' value = '$row[theme_name]']'>$row[theme_name]</option>
                                    ";
                                }
                                ?>
                            </select>
                            <button>submit</button>
                        </form>
                        <?php
                        session_start();
                        //var_dump($_SESSION["theme_state"]);

                        $mysqli = require __DIR__ . "/database.php";
                        $stmt = $mysqli->stmt_init();

                        $result = mysqli_query($mysqli, "SELECT * FROM theme WHERE theme_name = '$_SESSION[theme_state]' ORDER BY theme_id DESC");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                            $result = mysqli_query($mysqli, "SELECT * FROM theme  WHERE theme_name = '$_SESSION[theme_state]' ORDER BY theme_id DESC limit $i,1");
                            $row = $result->fetch_assoc();
                            echo " 
                            <form action='theme_set.php' method='post'>
                            <div class = 'themepallete'>
                            <b>
                            $row[theme_name]
                            <br>
                            <div style='font-weight:lighter'>
                            </div>
                            onTime: $row[onTime]  offTime: $row[offTime]
                            <br>
                            state: $row[theme_state]
                            <br>
                            </b>         
                            <input type='submit' name='theme_state' value='$row[theme_state]' >
                            <input type='hidden' name = 'theme_id' value = '$row[theme_id]'>  
                            <input type='submit' name='delete' value='delete'>                      
                            <input type='hidden' name = 'theme_id' value = '$row[theme_id]'>  
                            </div>
                            </form>
                            ";
                        }



                        ?>

                    </div>



                    <!--<form action='theme_set.php' method='post'>
                    <input type='submit' name='formSubmit' />
                </form>-->

                </div>
            </div>

            <div class="themepallete" id style="width:800px">
                <div class="message" style="font-size: 10px">

                    <p class="themetext" id="themeletter">This is your themes</p>
                    <?php
                    $mysqli = require __DIR__ . "/database.php";
                    $stmt = $mysqli->stmt_init();

                    $result = mysqli_query($mysqli, "SELECT * FROM theme ORDER BY theme_id DESC");
                    $num    = mysqli_num_rows($result);
                    $i = 0;

                    for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM theme ORDER BY theme_id DESC limit $i,1");
                        $row = $result->fetch_assoc();
                        echo " 
                        <form action='theme_set.php' method='post'>
                        <div class = 'themepallete'>
                        <b>
                        $row[theme_name]
                        <br>
                        <div style='font-weight:lighter'>
                        </div>
                        onTime: $row[onTime]  offTime: $row[offTime]
                        <br>
                        state: $row[theme_state]
                        <br>
                        </b>         
                        <input type='submit' name='theme_state' value='$row[theme_state]' >
                        <input type='hidden' name = 'theme_id' value = '$row[theme_id]'>  
                        <input type='submit' name='delete' value='delete'>                      
                        <input type='hidden' name = 'theme_id' value = '$row[theme_id]'>  
                        </div>
                        </form>
                        ";
                    }
                    ?>
                    <!--<form action='theme_set.php' method='post'>
                    <input type='submit' name='formSubmit' />
                </form>-->

                </div>
            </div>

        </main>
    </div>

</body>

</html>
<script src="./jquery.min.js"></script>
<script>
    document.onkeydown = function(e) {
        if ((e || event).keyCode == 13) {
            var devices = document.getElementById("deviceselect").value;
            var onTime = document.getElementById("onTime").value;
            var offTime = document.getElementById("offTime").value;
            var place = document.getElementById("place").value;
            var theme = document.getElementById("theme").value;
            var board = document.querySelector("#hello")
            var message = "Mode: " + theme + " - The " + devices + " will be turned on at " + onTime + " and turned of at " + offTime;
            var themeletter = document.createElement("div");
            themeletter.classList.add("themetext");

            var themes = document.createElement("div");
            themes.classList.add("themepallete");
            themes.innerText = message;
            themes.appendChild(themeletter);
            board.appendChild(themes);
        }
    }

    window.onload = function() {
        //获取select
        let select = document.getElementsByTagName("select")[0];
        //获取子节点
        let options = select.children;//获取所有子节点--option

        select.onchange = function () {
            let index = select.selectedIndex;//获取选择的option对应的索引；
            let name = options[index].innerHTML;

            $.post("./theme_row.php",
            {
                name:name,
            },
            function(data,item) {
                var data = JSON.parse( data )
                var html = '';
                for (var i=0;i<data.length;i++){
                    html += "<option value="+ data[i][3] + ">"+ data[i][3] + "</option>";
                }
                $("#pattern").append(html);
            });

        };
    }
</script>