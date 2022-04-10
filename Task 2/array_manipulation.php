<?php

/**
 * Дадена е низа со производи, која треба да се обработи со крајна цел да се добие и испечати низа која ќе ги задоволува следните услови:
 *
 * 1. Секој зеленчук треба да остане
 * 2. Само овошјето кое е поефтино од 10 денари треба да остане
 * 3. Само зачините кои почнуваат на буквата "К" треба да останат независно од дали буквата е голема или мала.
 *
 * На крај доколку сумата од цените на останатите продукти ви изнесува повеќе од 40 сортирајте ги производите по
 * цена во опаѓачки редослед и отстранете продукти почнувајќи од оние со најниска цена се додека вкупната сума не е еднаква или помала од 40
 */

$produkti = [
    "Banana" => [
        "vid" => "ovosje",
        "cena" => 8
    ],
    "jabolko" => [
        "vid" => "ovosje",
        "cena" => 11
    ],
    "Jagoda" => [
        "vid" => "ovosje",
        "cena" => 6
    ],
    "brokula" => [
        "vid" => "zelencuk",
        "cena" => 9
    ],
    "Morkov" => [
        "vid" => "zelencuk",
        "cena" => 14
    ],
    "kari" => [
        "vid" => "zacin",
        "cena" => 4
    ],
    "Kurkuma" => [
        "vid" => "zacin",
        "cena" => 6
    ],
    "bukovec" => [
        "vid" => "zacin",
        "cena" => 8
    ]
];


$result = [];
foreach ($produkti as $key => $value) {

    if ($value['vid'] === 'zelencuk') {
        $result[$key] = $value;
    }

    if ($value['vid'] === 'ovosje' && $value['cena'] < 10) {
        $result[$key] = $value;
    }

    if ($value['vid'] === 'zacin' && (substr($key, 0, 1) === "k" || substr($key, 0, 1) === "K")) {
        $result[$key] = $value;
    }
}


uasort($result, function ($a, $b) {
    return $a['cena'] < $b['cena'] ? -1 : 1;
});

$maxSum = 40;
$total = 0;


foreach ($result as $key => $index) {

    if (($total + $index['cena']) < $maxSum) {
        $total += $index['cena'];
    } else {
        unset($result[$key]);
    }
}

var_dump($result);

