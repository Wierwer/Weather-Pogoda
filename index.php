<?php
session_start();
?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title> Pogoda na 5 dni!</title>

</head>
<body>


 <H1>Pogodas:</H1>
    <form action="pobieranieinf.php" method="post">
 Podaj miejscowość: <input type="text" name="city" required/>
 <input type="submit" value="Pokaż pogodę" />
 <br /><br />
    </form>



    <?php

require_once "connection.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error".$polaczenie->connect_errno;
}
else
{

    $sql2 = "SELECT city FROM city ORDER BY id DESC LIMIT 5;";
    
    if($rezultat2 = @$polaczenie->query($sql2))
    {


        echo"<h4>Ostatnio wyszukiwane miejscowości: </h4><br />";
        while ($aport1 = $rezultat2->fetch_assoc())
         {
            printf ($aport1["city"]."<br />");
        }
        mysqli_free_result($rezultat2);
        
    }
    $polaczenie->close();
}
?>
</body>
</html>