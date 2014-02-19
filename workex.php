<?php
  //getting body and number then putting the body in to an array and settin up other neede variabble and arrays
$body = $_REQUEST['Body'];


$bodyarray = explode(' ', $body);
$num = $_REQUEST['From'];
$unusabblechar = array("1","2","3","4","5","6","7","8","9","0")
  
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  
  //defining function
  function weather_forcast ($town, $country) {
   //getting json and getting the bit we need 
    $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$town.",".$country;
    $json = file_get_contents($jsonurl);
    $weather = json_decode($json,true);
    $des = $weather [weather][0][description]
    
    
    //Twilio api bit
    echo "<Response>\n";
    echo "<Sms>The weather in ".$town." is currently ".$Des."</Sms> \n";
    echo "</Response>\n";
  }
 
function error_message() {
  echo "<Response>\n";
    echo "<Sms> Sory we had some problems responding to your text. Please makesure you enter data with corect spelling and the form the form '<town/state>,<country>'</Sms>";
    echo "<Response>\n";
} 


 //checking the form
 //if there is an uneaven number of elements in the array 
  if sizeof($bodyarray) % 2 != 0 {
    error_message();
  }
  else if stringpos($body) != false { 
    crror_message();
  else {
    weather_forcast(body[0],body[1]);
  }
?>
