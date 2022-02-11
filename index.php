<?php

require_once('components/header.php');

$year = 2021;
$format = 'https://ergast.com/api/f1/%s/constructorStandings.json';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, sprintf($format, $year));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$standings = json_decode($result, true)['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'];
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
                <u>Constructor</u>
            </div>
        </th>
        <th>
            <div class="formula_list">
                <u>Points</u>
            </div>
        </th>
    </tr>
    <?php foreach ($standings as $standing) : ?>
        <tr>
            <td>
                <div class="<?= $standing['Constructor']['constructorId'] ?> formula_list">
                    <?= $standing['position'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructor']['constructorId'] ?> formula_list">
                    <?= $standing['Constructor']['name'] ?>
                </div>
            </td>
            <td>
                <div class="<?= $standing['Constructor']['constructorId'] ?> formula_list">
                    <?= $standing['points'] ?>
                </div>
            </td>
        </tr>
    <?php endforeach ?>
</table>