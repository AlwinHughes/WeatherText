<?php
  //getting body and number 
$body = $_REQUEST['Body'];
$num = $_REQUEST['From'];
  
  
  
  
  //obtaining json
  function weather_forcast ($town, $country) {
    $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$town.",".$country;
    $json = file_get_contents($jsonurl);
    $weather = json_decode($json,true);
    $des = $weather [weather][0][description]
    
    
    //Twilio api bit
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<Response>\n";
    echo "<Sms>The weather in ".$town." is currently ".$Des."<Sms> \n";
    echo "</Response>\n";
  }
  
  weather_forcast(body[0],body[1]);
  
?>
