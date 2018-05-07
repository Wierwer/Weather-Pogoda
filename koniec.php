<?php

session_start();

?>


<?php
$cityy = $_SESSION['miasto'];
$ch = curl_init();
$key= '8626e63585a1b19638685f5ec166edb4';
$url = 'api.openweathermap.org/data/2.5/forecast?q='.$cityy.'&&APPID='.$key;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$wyjscie = curl_exec($ch);

$xxx = json_decode($wyjscie, true);

//error
$err = $xxx['cod'];
if($err==404)
{
    echo "<html>";
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title> Pogoda na 5 dni!</title>";

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
    echo "<div class='error'>Przepraszamy: nie ma takiej miejscowości!</div>";
    echo "<a href ='index.php'>Wróć do początku</a>";
    
}
else
{



//Jesli wszystko ok

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
echo "<title> Pogoda na 5 dni!</title>";

echo "</head>";
echo "<body>";



$kel= 273.15;
$kk=round($temp-$kel,1);
$kk1=round($temp2-$kel,1);
$kk2=round($temp3-$kel,1);
$kk3=round($temp4-$kel,1);
$kk4=round($temp5-$kel,1);

echo "<h1>Twoje wybrane miasto to: ".$_SESSION['miasto']."!";
echo "<h1>Dzień pierwszy!</h1><br />";
echo "<strong> Temperatura: </strong>".$kk."°C"."<br />";
echo "<strong> Prędkość Wiatru: </strong>".$wind."<br />";
echo "<strong> wilgotność powietrza: </strong>".$humidity."<br />";
echo "<strong> Zachmurzenie: </strong>".$des."<br />";
echo "<strong> Data: </strong>".$date."<br /><br /><br />";

echo "<h1>Dzień drugi!</h1><br />";
echo "<strong> Temperatura: </strong>".$kk1."°C"."<br />";
echo "<strong> Prędkość Wiatru: </strong>".$wind2."<br />";
echo "<strong> wilgotność powietrza: </strong>".$humidity2."<br />";
echo "<strong> Zachmurzenie: </strong>".$des2."<br />";
echo "<strong> Data: </strong>".$date2."<br /><br /><br />";

echo "<h1>Dzień trzeci!</h1><br />";
echo "<strong> Temperatura: </strong>".$kk2."°C"."<br />";
echo "<strong> Prędkość Wiatru: </strong>".$wind3."<br />";
echo "<strong> wilgotność powietrza: </strong>".$humidity3."<br />";
echo "<strong> Zachmurzenie: </strong>".$des3."<br />";
echo "<strong> Data: </strong>".$date3."<br /><br /><br />";

echo "<h1>Dzień czwarty!</h1><br />";
echo "<strong> Temperatura: </strong>".$kk3."°C"."<br />";
echo "<strong> Prędkość Wiatru: </strong>".$wind4."<br />";
echo "<strong> wilgotność powietrza: </strong>".$humidity4."<br />";
echo "<strong> Zachmurzenie: </strong>".$des4."<br />";
echo "<strong> Data: </strong>".$date4."<br /><br /><br />";

echo "<h1>Dzień piąty!</h1><br />";
echo "<strong> Temperatura: </strong>".$kk4."°C"."<br />";
echo "<strong> Prędkość Wiatru: </strong>".$wind5."<br />";
echo "<strong> wilgotność powietrza: </strong>".$humidity5."<br />";
echo "<strong> Zachmurzenie: </strong>".$des5."<br />";
echo "<strong> Data: </strong>".$date5."<br /><br /><br />";
echo "<br /><br /><br /><a href ='index.php'>Wyszukaj dla innej miejscowości.</a>";
}
?>

</body>
</html>