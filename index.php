<?php

// #1

echo '<pre>';
echo " 1 ___________________________________________________________\n\n";

$arr = ["String1", "String2"];

function func1($arr, $flag = false)
{
    $res = '';
    if ($flag) {
        $res = implode('', $arr);
        return $res;
    } else {
        foreach ($arr as $elem) {
            echo "<p> $elem </p>";
        }
    }

    return $res;
}

echo func1($arr);
echo "\n";
echo func1($arr, true);
echo "\n";


echo "\n\n";
// #2
echo " 2 ___________________________________________________________\n\n";


function func2($arr, $math_type)
{
    $res = 0;
    try {
        foreach ($arr as $arr_elem) {
            if (is_numeric($arr_elem) && !is_string($arr_elem)) {
                switch (is_string($math_type)) {
                    case '+':
                        $res = $res + $arr_elem;
                        break;
                    case '-':
                        $res = $res - $arr_elem;
                        break;
                    case '*':
                        $res = $res * $arr_elem;
                        break;
                    case '/':
                        $res = $res / $arr_elem;
                        break;
                    default:
                        throw new Exception('Не корректная операция.');
                }
            } else {
                throw new Exception('Не корректные данные.');
            }
        }
        echo $res . PHP_EOL;
    } catch (Exception $e) {
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }
}

func2([1, 3, 5], '+');
echo "\n";
func2([1, 'dsf', 5], '+');
echo "\n";
func2([1, 2], true);
echo "\n";


echo "\n\n";

// #3
echo " 3 ___________________________________________________________\n\n";

function func3($math_style, ...$arr) // массив как список аргументов
{
    func2($arr, $math_style);
}

func3('+', 1, 2, 3);
echo "\n";
func3('+', 1, 2, 'hello');
echo "\n";

echo "\n\n";

// #4
echo " 4 ___________________________________________________________\n\n";


function multiс($first, $second)
{
    try {
        if (is_int($first) && is_int($second)) {
            echo "<table>";
            for ($i = 1; $i <= $first; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $second; $j++) {
                    echo "<td>&nbsp;" . ($i * $j) . "&nbsp;</td>";
                }
                echo "</tr>";
            }
            echo "</table> ";
        } else {
            throw new Exception('Не корректные данные.');
        }
    } catch (Exception $e) {
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }
}

multiс(3, 4);
echo "\n";
multiс(3, 1.5);
echo "\n";

echo "\n\n";

// #5
echo " 5 ___________________________________________________________\n\n";

function isPalindrom($str)
{
    $reverse = "";
    for ($i = mb_strlen($str, "UTF-8"); $i >= 0; $i--) {
        $reverse = $reverse . mb_substr($str, $i, 1, "UTF-8");
    }
    return str_replace(' ', '', mb_strtolower($str)) === str_replace(' ', '', mb_strtolower($reverse));
}

function toConsole($str)
{
    if (isPalindrom($str)) {
        echo 'Палиндром';
    } else {
        echo 'Не палиндром';
    }
}

toConsole('Мороз в узел, лезу взором');
echo "\n";
toConsole('Яд ем как мед я');
echo "\n";


echo "\n\n";

// #6
echo " 6 ___________________________________________________________\n\n";

echo date('d.m.Y H:i');
echo "\n";
echo strtotime('24.02.2016 00:00:00');
echo "\n";

echo "\n\n";

// #7
echo " 7 ___________________________________________________________\n\n";

echo str_replace('К', '', 'Карл у Клары украл Кораллы');
echo "\n";
echo str_replace(['Две', 'лимонада'], ['Три', 'пива'], 'Две бутылки лимонада');
echo "\n";

echo "\n\n";

// #8
echo " 8 ___________________________________________________________\n\n";

function packets($str)
{
    $res = "";
    $packets = preg_match_all('|\d+|', $str, $packets)[0][0];
    if (preg_match("/\:\)/", $str, $packets)) {
        $res =  doSmile();
    } elseif ($packets > 1000) {
        $res = 'Сеть есть';
    }
    echo $res;
}

function doSmile()
{
    return '( ͡° ͜ʖ ͡°)';
}

$str = 'RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. ';
packets($str);
echo "\n";
$str = 'RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. :)';
packets($str);
echo "\n";


echo "\n\n";

// #9
echo " 9 ___________________________________________________________\n\n";


function getFile($file)
{
    if (file_exists($file) && is_file($file)) {
        $res = file_get_contents($file);
    } else {
        $res = 'Ошибка в имени файла';
    }
    echo $res;
}

getFile('test.txt');
echo "\n";

echo "\n\n";

// #10
echo " 10 ___________________________________________________________\n\n";

$file = fopen('anothertest.txt', 'w');
fwrite($file, 'Hello again!');
fclose($file);


$res = file_get_contents('anothertest.txt');
echo $res;
