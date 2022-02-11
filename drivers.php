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


<table style="width: 100%">
    <tr>
        <th>
            <div class="formula_list">
                <u>Position</u>
            </div>
        </th>
        <th>
            <div class="formula_list">
                <u>Driver</u>
            </div>
        </th>
        <th>
            <div class="formula_list constructor">
                <u>Constructor</u>
            </div>
        </th>
        <th>
            <div class="formula_list">
                <u>Points</u>
            </div>
        </th>
        <th>
            <div class="formula_list">
                <u>Wins</u>
            </div>
        </th>
    </tr>
    <?php foreach ($standings as $standing) : ?>
        <tr>
            <td>
                <div class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list">
                    <?= $standing['position'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list">
                    <?= $standing['Driver']['givenName'] ?> <?= $standing['Driver']['familyName'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list constructor">
                    <?= $standing['Constructors'][0]['name'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list">
                    <?= $standing['points'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructors'][0]['constructorId'] ?> formula_list">
                    <?= $standing['wins'] ?>
                </div>
            </td>
        </tr>
    <?php endforeach ?>
</table>