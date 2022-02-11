<?php

require_once('components/header.php');

$year = 2021;
$team = $_GET['team'];
$format = 'https://ergast.com/api/f1/%s/constructors/%s/drivers.json';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, sprintf($format, $year, $team));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);


$drivers = json_decode($result, true)['MRData']['DriverTable']['Drivers'];

foreach ($drivers as $driver) {
    echo $driver['givenName'] . " " . $driver['familyName'] . "<br>";
}
