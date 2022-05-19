<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="container bg-secondary mb-5">
       <!--- här skriver jag ut för och efternamnet från databasen som användaren matade in i registrationen
       och under den visar väder beroende var man befinner sig, man kan använda vpn och visar den plats som man satt på vpn:n 
       vilket Bond hjälpte mig att fixa det. På själva väder api:n och bootstrap delen blev jag stolt över mig vilket jag knappt kunde
       förra året och början av den här terminen vilket visar att jag utvecklats.
       --->
      <p class="h1 text-center bg-warning h-50">Welcome <?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']; ?></p>
      <!--- om användar väljer att logga ut så tas bort sessions i logout.php--->
      <p><a href = "logout.php" class="btn-light btn-block btn-lg justify-content-center">Sign Out</a></p>
        <div class="row text-center justify-content-center align-items-center mt-5">
            <div class="col">
                <p class="h3">Min temp: <span id="mintemp"></span><span>&#8451;</span></p>
            </div>
            <div class="col">
                <p class="display-1"><span id="name"></span></p>
            </div>
            <div class="col">
                <p class="h3">Max temp: <span id="maxtemp"></span><span>&#8451;</span></p>
            </div>
          </div>
          <div class="text-center justify-content-center align-items-center">
            <img src="" id="image" alt="icon" class="w-25 h-25">
            <h2 class="display-1"><span id="temp"></span><span>&#8451;</span></h2>
          </div>
          <div class="row text-center justify-content-center align-items-center">
            <p class="h3 col cols-lg-3 mb-5">Humidity: <span id="humidity"></span>%</p>
            <p class="h3 col cols-lg-3"></p>
            <p class="h3 col cols-lg-3 mb-5">Wind speed: <span id="wspeed"></span>&#13223;</p>
          </div>
    </div>
    
    <script>
        var place;
        $.get( "http://ip-api.com/json", function( data1 ) {
                window.place = data1.city;
                var link = "http://api.openweathermap.org/data/2.5/weather?q="+ window.place +"&units=metric&appid=af9726a0d34381fc92a3c86967e28656";


                $.get(link, function( data) {


                    let temp = Math.floor(data.main.temp)
            let mintemp = Math.floor(data.main.temp_min)
            let maxtemp = Math.floor(data.main.temp_max)
            let humidity = Math.floor(data.main.humidity)
            let speed = data.wind.speed
            let roundedSpeed = speed.toFixed(1)
            let iconimg = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
            $('#temp').html(temp);
            $('#mintemp').html(mintemp);
            $('#maxtemp').html(maxtemp);
            $('#humidity').html(humidity);
            $('#image').attr("src", iconimg);
            $('#name').html(data.name);
            $('#wspeed').html(roundedSpeed);


            });



            });

    </script>
</body>
</html>