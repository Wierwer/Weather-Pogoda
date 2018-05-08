<?php
session_start();
?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title> Weather for 5 days!</title>

</head>
<body>


 <H1>Weather:</H1>
    <form action="down_inf.php" method="post">
 City: <input type="text" name="city" required/>
 <input type="submit" value="Show weather" />
 <br /><br />
    </form>



    <?php

require_once "connection.php";
$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if($connect->connect_errno!=0)
{
    echo "Error".$connect->connect_errno;
}
else
{

    $sql2 = "SELECT city FROM city ORDER BY id DESC LIMIT 5;";
    
    if($result = @$connect->query($sql2))
    {


        echo"<h4>Recently searched cities: </h4><br />";
        while ($apport = $result->fetch_assoc())
         {
            printf ($apport["city"]."<br />");
        }
        mysqli_free_result($result);
        
    }
    $connect->close();
}
?>
</body>
</html>