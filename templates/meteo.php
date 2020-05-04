<?php
require '../vendor/autoload.php';
session_start();
use \App\OpenWeather;
use \Exception;

$error = null;
$city = $_SESSION['city']. ',fr';

try {
        $weather = new OpenWeather('d589dc06232a355e833e1ac210cf188f');
        // $forecast = $weather->getForecast($city);
        $today = $weather->getToday($city);
} catch (Exception $e) {
        $error = $e->getMessage();
}

if ($today['name'] === null){
       $error = 'Désolé nous n\'avons pas trouvé de ville portant ce nom';
}
 
?>

<?php if ($error) : ?>
        <div class="error alert alert-danger"><?= $error ?></div>
<?php else : ?>
<div class="meteo">
        <div class="card">
                <img class="weather-image" src="asset/img/cloud-346710_640.png" class="card-img-top" alt="image-météo">
                <div class="card-body" >
                        <h5 class="card-title">En ce moment à <?= $today['name'] ?></h5>
                        <img src="http://openweathermap.org/img/wn/<?= $today['icon'] ?>@2x.png" alt="icone-meteo">
                <p class="card-text">Le <?= $today['date']->format('d/m/Y à H:i ') ?>la température est de : <?= $today['temp']. '°C ' . ' et c\'est ' . $today['description']?> </p>
                </div>
        </div>
</div>
<?php endif ?>


