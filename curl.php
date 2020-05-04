<?php

// Connection l'API Open Weather
$curl = curl_init('http://api.openweathermap.org/data/2.5/weather?q=Orleans,fr&APPID=d589dc06232a355e833e1ac210cf188f&units=metric&lang=fr');
curl_setopt_array($curl ,[
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 1
]);
$data = curl_exec($curl);
if ($data === false){
    var_dump(curl_error($curl));
} else {
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
        $data = json_decode($data, true);
        echo '<h2> Météo du jour </h2>';
        echo "<p>";
        echo 'Il fait : ' . $data['main']['temp'] . '°C en ce moment et le ciel est '  . $data['weather'][0]['description'];
        echo "</p>";

    }
    
}

curl_close($curl);