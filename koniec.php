<?php

session_start();

?>


<?php
//API
$cityy = $_SESSION['city1'];
$ch = curl_init();
$key= '8626e63585a1b19638685f5ec166edb4';
$url = 'api.openweathermap.org/data/2.5/forecast?q='.$cityy.'&&APPID='.$key;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$exit = curl_exec($ch);

$xxx = json_decode($exit, true);

//error
$err = $xxx['cod'];
if($err==404)
{
    echo "<html>";
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title> Weather for 5 days!</title>";

    echo "</head>";
    echo "<body>";
    echo "<style>";
    echo ".error";
    echo "{";
    echo "color:red;";
    echo "maring-top: 10px;";
    echo "marign-bottom: 10px;";
    echo "}";
    echo "</style>";
    echo "<div class='error'>I'm sorry: there is no such city!</div>";
    echo "<a href ='index.php'>Back!</a>";
    
}
else
{



//ALL OK

$temp = $xxx['list'][0]['main']['temp'];
$wind = $xxx['list'][0]['wind']['speed'];
$humidity = $xxx['list'][0]['main']['humidity'];
$des = $xxx['list'][0]['weather'][0]['description'];
$date = $xxx['list'][0]['dt_txt'];

$temp2 = $xxx['list'][8]['main']['temp'];
$wind2 = $xxx['list'][8]['wind']['speed'];
$humidity2 = $xxx['list'][8]['main']['humidity'];
$des2 = $xxx['list'][8]['weather'][0]['description'];
$date2 = $xxx['list'][8]['dt_txt'];

$temp3 = $xxx['list'][16]['main']['temp'];
$wind3 = $xxx['list'][16]['wind']['speed'];
$humidity3 = $xxx['list'][16]['main']['humidity'];
$des3 = $xxx['list'][16]['weather'][0]['description'];
$date3 = $xxx['list'][16]['dt_txt'];

$temp4 = $xxx['list'][24]['main']['temp'];
$wind4 = $xxx['list'][24]['wind']['speed'];
$humidity4 = $xxx['list'][24]['main']['humidity'];
$des4 = $xxx['list'][24]['weather'][0]['description'];
$date4 = $xxx['list'][24]['dt_txt'];

$temp5 = $xxx['list'][32]['main']['temp'];
$wind5 = $xxx['list'][32]['wind']['speed'];
$humidity5 = $xxx['list'][32]['main']['humidity'];
$des5 = $xxx['list'][32]['weather'][0]['description'];
$date5 = $xxx['list'][32]['dt_txt'];







echo "<!DOCTYPE HTML>";
echo "<html>";
echo "<head>";
echo "<meta charset='utf-8'>";
echo "<title> Weather for 5 days!</title>";

echo "</head>";
echo "<body>";


// Celsius
$kel= 273.15;
$kk=round($temp-$kel,1);
$kk1=round($temp2-$kel,1);
$kk2=round($temp3-$kel,1);
$kk3=round($temp4-$kel,1);
$kk4=round($temp5-$kel,1);


echo "<h1>Your selected city is: ".$_SESSION['city1']."!";
echo "<h1>First Day!</h1><br />";
echo "<strong> Temperature: </strong>".$kk."°C"."<br />";
echo "<strong> Wind Speed: </strong>".$wind."<br />";
echo "<strong> Humidity: </strong>".$humidity."<br />";
echo "<strong> Description: </strong>".$des."<br />";
echo "<strong> Date: </strong>".$date."<br /><br /><br />";

echo "<h1>Second Day!</h1><br />";
echo "<strong> Temperature: </strong>".$kk1."°C"."<br />";
echo "<strong> Wind Speed: </strong>".$wind2."<br />";
echo "<strong> Humidity: </strong>".$humidity2."<br />";
echo "<strong> Description: </strong>".$des2."<br />";
echo "<strong> Date: </strong>".$date2."<br /><br /><br />";

echo "<h1>Third Day!</h1><br />";
echo "<strong> Temperature: </strong>".$kk2."°C"."<br />";
echo "<strong> Wind Speed: </strong>".$wind3."<br />";
echo "<strong> Humidity: </strong>".$humidity3."<br />";
echo "<strong> Description: </strong>".$des3."<br />";
echo "<strong> Date: </strong>".$date3."<br /><br /><br />";

echo "<h1>Fourth Day!</h1><br />";
echo "<strong> Temperature: </strong>".$kk3."°C"."<br />";
echo "<strong> Wind Speed: </strong>".$wind4."<br />";
echo "<strong> Humidity: </strong>".$humidity4."<br />";
echo "<strong> Description: </strong>".$des4."<br />";
echo "<strong> Date: </strong>".$date4."<br /><br /><br />";

echo "<h1>Fifth Day!</h1><br />";
echo "<strong> Temperature: </strong>".$kk4."°C"."<br />";
echo "<strong> Wind Speed: </strong>".$wind5."<br />";
echo "<strong> Humidity: </strong>".$humidity5."<br />";
echo "<strong> Description: </strong>".$des5."<br />";
echo "<strong> Date: </strong>".$date5."<br /><br /><br />";

echo "<br /><br /><br /><a href ='index.php'>Search for another city.</a>";
}
?>

</body>
</html>