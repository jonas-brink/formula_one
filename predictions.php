<?php

require_once('components/header.php');

$year = 2021;
$format = 'https://ergast.com/api/f1/%s/driverStandings.json';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, sprintf($format, $year));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$standings = json_decode($result, true)['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'];
?>

<head>
    <script src="node_modules/sortablejs/Sortable.js"></script>
</head>

<body>
    <ul id="sorted_drivers" class="drivers_list">
    </ul>
    <ul id="unsorted_drivers" class="drivers_list">
        <?php foreach ($standings as $standing) : ?>
            <li class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list"><?= $standing['Driver']['givenName'] . " " . $standing['Driver']['familyName'] ?></li>
        <?php endforeach ?>
    </ul>
</body>








<script>
    var sorted_drivers = document.getElementById('sorted_drivers');
    var unsorted_drivers = document.getElementById('unsorted_drivers');
    var sortable_sort_drivers = new Sortable(sorted_drivers, {
        group: 'shared', // set both lists to same group
        animation: 150
    });
    var sortable_sort_drivers = new Sortable(unsorted_drivers, {
        group: 'shared',
        animation: 150
    });
</script>