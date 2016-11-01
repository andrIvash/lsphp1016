<?php
// #1
// Принято
echo '<pre>';
echo " 1 ___________________________________________________________\n\n";
$name = 'андрей иващенко';
$age = '36';
echo "Меня зовут $name \n";
echo 'Мне '.$age.' лет'.PHP_EOL;
echo "\"!|/'\"/\n";

echo "\n\n";

//#2
// Принято
echo " 2 ___________________________________________________________\n\n";
$all = 80;
$felt = 23;
$pencil = 40;
echo $paints =  $all - $felt - $pencil.PHP_EOL;

echo "\n\n";

//#3
// Не полностью соответствует заданию
echo " 3 ___________________________________________________________\n\n";
define("ROUND", 360);
echo ROUND.PHP_EOL;
// const ROUND = 280;

echo "\n\n";

//#4
// Принято
echo " 4 ___________________________________________________________\n\n";
$age = 36;
if ($age >= 18 && $age <=65) {
    echo "Вам еще работать и работать \n";
} elseif ($age > 65) {
    echo "Вам пора на пенсию \n";
} elseif ($age >= 1 && $age <=17) {
    echo "Вам ещё рано работать \n";
} else {
    echo "Неизвестный возраст \n";
}

echo "\n\n";


//#5
// Принято
echo " 5 ___________________________________________________________\n\n";
$day  = 5;
switch ($day) {
    case ($day > 0 && $day < 6):
        echo "Это рабочий день";
        break;
    case ($day == 6 || $day == 7):
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
        break;
}

echo "\n\n";

// Принято
echo " 6 ___________________________________________________________\n\n";
$bmw = [
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year"  =>  "2015"
];
$toyota = [
    "model" => "venza",
    "speed" => 100,
    "doors" => 5,
    "year"  =>  "2014"
];
$opel = [
    "model" => "astra",
    "speed" => 120,
    "doors" => 5,
    "year"  =>  "2010"
];

$result = array_merge_recursive($bmw, $toyota, $opel);
print_r($result).PHP_EOL;

$cars = ["CAR BMW", "CAR TOYOTA", "CAR OPEL"];
for ($i = 0; $i < count($cars); $i++) {
    echo  $cars[$i].PHP_EOL;
    foreach ($result as $value) {
        echo  $value[0].' ';
    }
    echo "\n\n";

}

echo "\n\n";

echo " 7 ___________________________________________________________\n\n";

echo "<table>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 10; $j++) {
        if ($i % 2 === 0 && $j % 2 === 0) {
            echo "<td>[".($i*$j)."]</td>";
        } elseif (($i % 2 !== 0 && $j % 2 !== 0)) {
            echo "<td>(".($i*$j).")</td>";
        } else {
            echo "<td>&nbsp;".($i*$j)."&nbsp;</td>";
        }
    }
    echo "</tr>";
}
echo "</table> ";


echo "\n\n";

// Принято
echo " 8 ___________________________________________________________\n\n";

echo $str = "Hello world of PHP";
echo "\n";
$arr = explode(" ", $str);
print_r($arr).PHP_EOL;

$end = end($arr);
while ($end) {
    echo $end.' - ';
    $end = prev($arr);
}


echo "\n\n";
