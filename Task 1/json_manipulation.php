<?php

/**
 * Даден е json објект кој треба да се обработи така што ќе ги следи следниве правила:
 *
 * 1. Треба продуктите внатре да се сортираат по цена во растечки редослед
 * 2. Доколку 2 продукти имаат исти цени треба да се сортираат по нивното име по азбучен ред
 * 3. На крај треба да се испечати string во json формат со таа содржина
 *
 * Пр. за добиен json '[{"name":"eggs", "price":1}, {"name":"coffee", "price":9.99}, {"name":"rice", "price":4.04}]'
 * треба да се испечати назад '[{"name":"eggs", "price":1}, , {"name":"rice", "price":4.04}, {"name":"coffee", "price":9.99}]'
 */

$json = '[{"name":"eggs", "price":1}, {"name":"Sugar", "price":4.04}, {"name":"coffee", "price":9.99}, {"name":"rice", "price":4.04}]';


$json = '[{"name":"eggs", "price":1}, {"name":"Sugar", "price":4.04}, {"name":"coffee", "price":9.99}, {"name":"rice", "price":4.04}]';

$arr1 = json_decode($json);

uasort($arr1, function ($a, $b) {
    return $a->price < $b->price ? -1 : 1;
});

$json = array_values($arr1);


$json = json_encode($json);

echo $json;