<?php
$weather = "";
$error = "";

if ($_GET['city']){

$urlContents =
    file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=31b8a8b4ca0a6cd845bc2d470ef54fc9");

$weatherArray = json_decode($urlContents, true);



 if($weatherArray['cod'] == 200){
   $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'.";

   $tempInCelsius = intval($weatherArray['main']['temp']-273);
   $feelsLike = intval($weatherArray['main']['feels_like']-273);

   $weather .= " The temperature is ".$tempInCelsius."&deg;C and feels like ".$feelsLike."&deg;C.  The wind speed is ".$weatherArray['wind']['speed'].".";


 }else{
     $weather = "Could not find city - please try again.";

 }



}


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Weather App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
     integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
     <link rel="stylesheet" crossorigin="anonymous"
      href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9lY28tY2RuLmNvLnVrL3dlYmRldmVsb3BlcjIuMC9jb250ZW50LzgtYXBpcy85LjIucGhwP2NpdHk9TG9uZG9u">
</head>

<body>

<div class="container">
      
          <h1>What's The Weather?</h1>
          
          
          
          <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of a city.</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value="">
  </fieldset>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      
          <div id="weather"><div class="alert alert-success" role="alert">
            <?php echo $weather ?>

         </div>
        </div>
      </div>

<footer>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
    <p>By:Raveen Panditha</p>  
</footer>
      



</body>

<style type="text/css">
      
      html { 
          background: url(background.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
        
          body {
              
              background: none;
              
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
              width: 450px;
              
          }
          
          input {
              
              margin: 20px 0;
              
          }
          
          #weather {
              
              margin-top:15px;
              
          }
          .btn-primary{
              border-radius: 35;
          }

          footer{
            font-size:x-small;
            margin-left:92%;
            color:aliceblue;

          }
         
      </style>

</html>