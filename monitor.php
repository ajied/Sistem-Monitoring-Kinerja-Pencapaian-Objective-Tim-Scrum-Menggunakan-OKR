<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Page</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/monitor.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function openNav() {
            document.getElementById("thissidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("thissidenav").style.width="0px";
        }
    </script>

    <nav>
        <div id=thissidenav class=sidenav>
            <a href="javascript:void(0)" class=closebtn onclick="closeNav()">&times;</a>

            <div class=usernav>
                <a href=#><img src="img/nav/chrome_2021-03-12_15-03-48.png" class=profilenav></a> 
                <a href=# class=namenav>Name..</a>
            </div>
            <a href=home.html>Home</a>
            <a href=account.html>Account Settings</a>
            <a href=index.html class="logout">Logout</a>    
        </div>
    </nav>

    <?php
        $connection = mysqli_connect("localhost","root","","sistem_monitoring");

        if (mysqli_connect_error()){
            echo "Failed to connect to the database" .mysqli_connect_error();
        };

        $team_result = mysqli_query($connection, "SELECT * FROM team");
        $objective_result = mysqli_query($connection, "SELECT * FROM objective");
        $keyresult_result = mysqli_query($connection, "SELECT * FROM keyresult");
    ?>

    <div id="heading">
        <a href=#><img src="img/nav/threelines.png" onclick="openNav()" class=navicon></span></a>
        <div class="title">Planing dan Evaluasi Quarter 4</br> Badan Sistem Informasi</div>
    </div>

    <div class="teamcontainer">
        <div class="teamname">
            <?php
                $team = mysqli_fetch_array($team_result);
                echo $team['team_name'];
            ?>
        </div>
        <div class="spacer"></div>
        <div class="quarterbox">Quarter</div>
    </div>

<?php

    while ($objective = mysqli_fetch_array($objective_result))
    {
        echo "<div class='table_container'>
                <table class='objective table table-bordered' style='width: 53%;'>
                    <tr>
                        <td class='obj_title'>";
                                
                            echo $objective['objective_name'];
                            
        echo "          </td>
                        <td class='progress_title'>Progress</td>
                    </tr>";

                        while ($keyresult = mysqli_fetch_array($keyresult_result))
                        {
        echo "      <tr>";
                               
        echo "          <td>". $keyresult['keyresult_name']."</td>";

        echo "          <td class='progressbar_percentage'>";
        echo "              <div class='progress' style='border-radius: 0px;'>";
        echo "                  <div class='progress-bar' role='progressbar' style='width: 25%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>25%</div>";
        echo "              </div>";
        echo "          </td>";
        echo "      </tr>";
                        };
                
        echo "  </table>

                <table class='objective_fulfillment table table-bordered' style='width: 20%;'>
                    <tr>
                        <td class='objfull_width'>Objective fulfillment</td>
                    </tr>
                    <tr>
                        <td class='progressbar_percentage'  style='height: 49px;'>
                            <div class='progress' style='border-radius: 0px;'>
                                <div class='progress-bar' role='progressbar' style='width: 25%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>25%</div>
                            </div>
                        </td>
                    </tr>
                </table>";
    };


    echo "  <table class='quarter table table-bordered' style='width: 24%';>
                <tr>
                    <td>JAN</td>
                    <td>FEB</td>
                    <td>MAR</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
        </table>";
?>

</div>

<table class="total_objective_fulfillment">
    <tr>
        <td class="total_objective_full_width">Total Objective fulfillment</td>
        <td class="total_progressbar_percentage">
            <div class="progress" style="border-radius: 0px;">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </td>
    </tr>
</table>

<div class="button_wraper">
    <a href=new_objective.html><input type="button" name="NEW OBJECTIVE" value="NEW OBJECTIVE" class="new_obj"></a>
    <a href=edit_objective.html><input type="button" name="EDIT OBJECTIVE" value="EDIT OBJECTIVE" class="new_obj"></a>
    <a href=remove_objective.html><input type="button" name="REMOVE OBJECTIVE" value="REMOVE OBJECTIVE"class="rmv_obj"></a>
</div>

</body>
</html>