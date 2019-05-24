<?php
$country_name = $_POST['search'];

$ch = curl_init();

curl_setopt_array($ch,[
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://restcountries.eu/rest/v2/name/$country_name",
     CURLOPT_USERAGENT => 'Webservie Agent'
    ]);
    
    $response = curl_exec($ch);
    
    curl_close($ch);

    $result = json_decode($response,true);
    
    echo $result['name'];
    
