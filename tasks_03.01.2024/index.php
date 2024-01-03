<?php

/**
 * сумма цифр числа через рекурсию
 *
 * @param integer $val
 * @return integer
 */
function sumNumbers(int $val) : int
{

    if ($val <= 9) {
        return $val;
    }

    $result = sumNumbers(($val / 10) - 0.1 * ($val % 10)) + $val % 10;

    return $result;
}

/**
 * кол. цифр в числе через рекурсию
 *
 * @param integer $val
 * @return integer
 */
function countNumbers(int $val) : int
{

    if ($val <= 9) {
        return 1;
    }

    $count = countNumbers(($val / 10) - 0.1 * ($val % 10)) + 1;

    return $count;
}

/**
 * цифровая цифра числа через рекурсию
 *
 * @param integer $val
 * @return integer
 */
function digitalNumber(int $val) : int
{

    $result = 0;

    if ($val <= 9) {
        return $val;
    }

    while ($val >= 1) {
        $result += $val % 10;
        $val = ($val / 10) - 0.1 * ($val % 10);
    }

    if ($result > 9) {
        $result = digitalNumber($result);
        return $result;
    } else {
        return $result;
    }
}

/**
 * Фибоначчи через рекурсию
 *
 * @param integer $val
 * @return integer
 */
function fibonachi(int $val) : int
{

    if ($val == 1 || $val == 2) {
        return 1;
    }
    return (fibonachi($val-1) + fibonachi($val-2)); 
}

/**
 * функция Акермана
 *
 * @param integer $n
 * @param integer $m
 * @return integer
 */
function acerman(int $n, int $m) : int
{
    if ($n == 0) {
        return $m - 1;
    }

    if ($n != 0 && $m == 0) {
        return acerman($n-1, 1);
    }

    if ($n > 0 && $m > 0) {
        return acerman($n -1, acerman($n, $m -1));
    }
}

/**
 * число в обратном порядке
 *
 * @param integer $val
 * @return void
 */
function numberOposite(int $val) : void
{

    if ($val > 0) {
        echo $val % 10;
        numberOposite(($val / 10) - 0.1 * ($val % 10));
    }
}

/**
 * количество элементов в массиве
 *
 * @param array $array
 * @return integer
 */
function countElementsInArray(array $array) : int
{

    $count = 0;

    for ($i=0; isset($array[$i]); $i++) { 
        $count++;
    }

    return $count;
}

/**
 * напечатать массив чисел наоборот
 *
 * @param array $array
 * @param integer $count
 * @return void
 */
function printArrayOposite(array $array, int $count) : void
{

    if ($count > 0) {
        echo $array[$count - 1] . "\n";
        printArrayOposite($array, $count - 1);
    }
}

/**
 * Перевод число в N-ричную систему счисления
 *
 * @param integer $val
 * @param integer $n
 * @return string
 */
function numberSystem(int $val, int $n) : string
{ 

    $symbols = [
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => 'A',
        11 => 'B',
        12 => 'C',
        13 => 'D',
        14 => 'E',
        15 => 'F'
    ];

    if ($val < $n) {
        return $symbols[$val];
    }

    if ($val >= $n) {
        return numberSystem(($val / $n), $n) . $symbols[$val % $n];
    }
}

/**
 * Является число простым
 *
 * @param integer $val
 * @param integer $n
 * @return void
 */
function simpleNumber(int $val, int $n = 2)
{

    if ($val == 2 || $n > $val / 2) {
        echo $val . ' - число простое';
        die();
    }

    if ($val % $n == 0 || $val < 2) {
        echo $val . ' - число непростое';
        die();
    }

    if ($n < $val / 2) {
        return simpleNumber($val, $n + 1); 
    }
}

/**
 * выводит макс и мин, разницу между макс и мин, и индексы этих значений
 *
 * @param array $arr
 * @return void
 */
function arrayMaxAndMin(array $arr) : void
{
    if (!empty($arr)) {

        $max = $arr[0];
        $min = $arr[0];
        $indexMax = 0;
        $indexMin = 0;

        foreach ($arr as $key => $value) {
            if ($max < $value) {
                $max = $value;
                $indexMax = $key;
            }
            
            if ($min > $value) {
                $min = $value;
                $indexMin = $key;
            }
        }
        
        echo "Минимальное число: " . $min . " В массиве под индексом: " . $indexMin . "\n";
        echo "Максимальное число: " . $max . " В массиве под индексом: " . $indexMax ."\n";
        echo "Разница максимального и минимального: " . $max - $min . "\n";    
    }
}

/**
 * добавление в какую то часть массива значение или другой массив
 * @param array $array
 * @param array/int/string $insert - сама вставка
 * @param string/int $pos - место вставки, можно begin, mid, end
 * @return array
 */
function addInArray(array $array, array | int | string $insert, string | int $pos = "end") : array
{

    if ($pos == "begin") {

        if (is_array($insert)) {

            for ($i=0; isset($array[$i]); $i++) { 
                $insert[] = $array[$i];
            }

            echo "Заход в -1" . "\n";
            return $insert;
        }

        if (is_int($insert) || is_string($insert)) {
            
            $result = [];
            $result[] = $insert;

            for ($i=0; isset($array[$i]); $i++) { 
                $result[] = $array[$i];
            }

            echo "Заход в 0" . "\n";
            return $result;
        }
    }

    if ($pos == "mid") {

        if (count($array) % 2 == 1) {
            $pos = ((count($array) - 1) / 2);
        }else {
            $pos = (count($array) / 2);
        }
        
        if (is_array($insert)) {

            $result = [];

            for ($i=0; $i < $pos - 1; $i++) {
                $result[] = $array[$i];
            }

            for ($i=0; isset($insert[$i]); $i++) {
                $result[] = $insert[$i];
            }

            for ($i=$pos - 1; $i < count($array); $i++) {
                $result[] = $array[$i];
            }

            echo "Заход в 1" . "\n";
            return $result;
        }

        if (is_int($insert) || is_string($insert)) {
            
            $result = [];

            for ($i=0; $i < $pos; $i++) {
                $result[] = $array[$i];
            }
 
                $result[] = $insert;

            for ($i=$pos; $i < count($array); $i++) {
                $result[] = $array[$i];
            }

            echo "Заход в 2" . "\n";
            return $result;
        }
    }

    if ($pos == "end") {

        if (is_array($insert)) {
            
            for ($i=0; isset($insert[$i]); $i++) { 
                $array[] = $insert[$i];
            }

            echo "Заход в 3" . "\n";
            return $array;
        }

        if (is_int($insert) || is_string($insert)) {

            $array[] = $insert;
            echo "Заход в 4" . "\n";
            return $array;
        }
    }

    if (is_int($pos)) {

        if (is_array($insert)) {
            
            $result = [];

            for ($i=0; $i < $pos; $i++) {
                $result[] = $array[$i];
            }

            for ($i=0; isset($insert[$i]); $i++) {
                $result[] = $insert[$i];
            }

            for ($i=$pos; $i < count($array); $i++) {
                $result[] = $array[$i];
            }

            echo "Заход в 5" . "\n";
            return $result;
        }

        if (is_int($insert) || is_string($insert)) {
            
            $result = [];

            for ($i=0; $i < $pos; $i++) {
                $result[] = $array[$i];
            }

            $result[] = $insert;

            for ($i=$pos; $i < count($array); $i++) {
                $result[] = $array[$i];
            }

            echo "Заход в 6" . "\n";
            return $result;
        }
    }
}

/**
 * Сортировка сначала отрицательные, а потом положительные
 *
 * @param array $array
 * @return array
 */
function sortF(array $array) : array
{

    for ($i=0; isset($array[$i]); $i++) { 
        if ($array[$i] >= 0) {
            $pozitiv[] = $array[$i];
        } else {
            $negetiv[] = $array[$i];
        }
    }

    for ($i=0; isset($pozitiv[$i]); $i++) { 
        $negetiv[] = $pozitiv[$i];
    }

    return $negetiv;
}

/**
 * Заполнение матрицы по спирали различного размера
 *
 * @param integer $n
 * @param integer $m
 * @return array
 */
function spiral(int $n, int $m) : array
{

    $Ibeg = 0;//точки прямоугольника очерчиваевого
    $Ifin = 0;
    $Jbeg = 0;
    $Jfin = 0;
    
    $k = 1; // значение переменной, которой заполняем
    $i = 0; // координаты
    $j = 0;

    while ($k <= $n * $m){

        $array[$i][$j] = $k;

        // Если у нас верхняя сторона прямоугольника и мы не достигла правой стороны, то двигаемся вправо: ++j
        // Если мы на правой стороне прямоугольника и не достигли нижней стороны, то двигаемся вниз: ++i
        // Если мы на нижней стороне прямоугольника и не достигли левой стороны, то двигаемся влево: --j
        // Иначе двигаемся вверх: --i

        if ($i == $Ibeg && $j < $m - $Jfin - 1) {

            ++$j;
        }
        else if ($j == $m - $Jfin - 1 && $i < $n - $Ifin - 1) {

            ++$i;
        }
        else if ($i == $n - $Ifin - 1 && $j > $Jbeg) {

            --$j;
        }
        else {

            --$i;
        }

        // Если мы находимся на второй строке
        // Если мы находимся на первом столбце
        // И, в случае, если чертим не прямоугльник, а вертикальную линию, 
        // если первая строка не равна последней.

        if (($i == $Ibeg + 1) && ($j == $Jbeg) && ($Jbeg != $m - $Jfin - 1)){

            ++$Ibeg;
            ++$Ifin;
            ++$Jbeg;
            ++$Jfin;
        }

        ++$k;
    }
    
    return $array;
}

/**
 * сколько раз в матрице чисел меняется знак
 *
 * @param array $array
 * @return integer
 */
function countChangesSigns(array $array) : int
{

    $count = 0;

    if ($array[0][0] > 0) {
        $flag = true;
    } else { 
        $flag = false;
    }

    foreach ($array as $line ) {
        foreach ($line as $value) {
            
            if ($value > 0 && $flag) {
                continue;
            }

            if ($value < 0 && !$flag) {
                continue;
            }

            if ($value > 0 && !$flag) {
                $count++;
                $flag = true;
            }

            if ($value < 0 && $flag) {
                $count++;
                $flag = false;
            }
        }
    }

    return $count;
}

/**
 * матрица рандомных чисел без нуля
 *
 * @param integer $n
 * @param integer $m
 * @return array
 */
function arrayValuesWithoutZero(int $n, int $m) : array
{
    
    $array = [];
    
    for ($i=0; $i <= $n; $i++) { 
        for ($j=0; $j <= $m; $j++) {

            do {
                $numbr = mt_rand(-100, 100);
            } while ($numbr == 0);
            
            $array[$i][$j] = $numbr;
        }
    }

    return $array;
}

/**
 * Только матрица рандомных чисел
 *
 * @param integer $lines
 * @param integer $count
 * @return array
 */
function arrayValues(int $lines, int $count) : array
{

    $array = [];
    
    for ($i=0; $i <= $lines; $i++) { 
        for ($j=0; $j <= $count; $j++) {            
            $array[$i][$j] = mt_rand(0, 10);
        }
    }

    return $array;
}

/**
 * кол. различных элементов в массиве
 *
 * @param array $array
 * @return integer
 */
function countDifferentElementsInArray(array $array) : int
{

    $arrayElements = [];

    foreach ($array as $line) {
        foreach ($line as $value) {
            if (in_array($value, $arrayElements)) {
                continue;
            } else {
                $arrayElements[] = $value;
            }
        }
    }

    return count($arrayElements);
}

/**
 * симметричность квадратной матрицы по диагоналям
 *
 * @param array $array
 * @return void
 */
function symmetricalSquareArray(array $array) : void
{

    $flagMain = true;
    $flagSecondary = true;
    $count = count($array);

    for ($i=0; isset($array[$i]); $i++) {
        for ($j=0; isset($array[$i][$j]); $j++) {
            if ($array[$i][$j] != $array[$j][$i]) {
                $flagMain = false;
                break(2);
            }
        } 
    }

    for ($i=0; $i <= $count - 1; $i++) {
        for ($j=0; $j <= $count - 1; $j++) {
            if ($array[$i][$j] != $array[$count-$j-1][$count-$i-1]) {
                $flagSecondary = false;
                break(2);
            }
        } 
    }

    if ($flagMain == true && $flagSecondary == true) {
        echo "Квадратная матрица симметрична по главной и побочной диагонали";
    }elseif ($flagMain == true && $flagSecondary == false) {
        echo "Квадратная матрица симметрична по главной диагонали";
    }elseif ($flagMain == false && $flagSecondary == true) {
        echo "Квадратная матрица симметрична по побочной диагонали";
    }else {
        echo "Квадратная матрица не симметрична";
    }
}

/**
 * создание симметричной квадратной матрицы относительно главной или побочной диагонали
 *
 * @param integer $n
 * @param string $str главная (MAIN) или побочноая (SECONDARY) диагонали
 * @return array
 */
function squareArray(int $n, string $str = "MAIN") : array
{

    if ($str == "MAIN") {

        for ($i=0; $i <= $n-1; $i++) { 
            for ($j=0; $j <= $i; $j++) { 
                $array[$i][$j] = mt_rand(0, 9);
            }
        }
    
        for ($i=0; $i <= $n - 2; $i++) { 
            for ($j=$i+1; $j <= $n - 1; $j++) { 
                $array[$i][$j] = $array[$j][$i];
            }
        }
    
        return $array;

    } elseif ($str == "SECONDARY") {

        for ($i=0; $i <= $n-1; $i++) { 
            for ($j=0; $j <= $n - $i - 1; $j++) { 
                $array[$i][$j] = mt_rand(0, 10);
            }
        }
    
        for ($i=1; $i <= $n - 1; $i++) { 
            for ($j=$n - $i; $j <= $n - 1; $j++) { 
                $array[$i][$j] = $array[$n-$j-1][$n-$i-1];
            }
        }
    
        return $array;
    }
}

/**
 * Сортировка пузырьком с исп. foreach
 *
 * @param array $array
 * @return array
 */
function bubblySort(array $array) : array
{
    foreach ($array as $i => $value) {
        foreach ($array as $j => $val) {
            if ($array[$j] > $array[$i]) {
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
            }
        }
    }
    
    return $array;
}

/**
 * Сортировка пузирьком улучшенная, Шейкер
 *
 * @param array $array
 * @return array
 */
function shakerSort(array $array) : array
{
    $right = count($array) - 1;
    $left = 0;
    $flag = true;

    while ($right > $left && $flag) {

        $flag = false;

        for($i = $left; $i < $right; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                $tmp = $array[$i + 1];
                $array[$i + 1] = $array[$i];
                $array[$i] = $tmp;
                $flag = true;
            }
        }

        $right--;

        for ($i=$right; $i > $left; $i--) { 
            if ($array[$i - 1] > $array[$i]) {
                $tmp = $array[$i];
                $array[$i] = $array[$i - 1];
                $array[$i - 1] = $tmp;
                $flag = true;
            }
        }

        $left++;
    }

    return $array;
}

/**
 * Сортировка вставкой
 *
 * @param array $array
 * @return array
 */
function insertSort(array $array) : array
{

    $count = count($array);
 
    for ($i = 1; $i < $count; $i++) {
        $tmp = $array[$i];
        $j = $i - 1;
 
        while (isset($array[$j]) && $array[$j] > $tmp) {
            $array[$j + 1] = $array[$j];
            $array[$j] = $tmp;
            $j--;
        }
    }
 
    return $array;
}

/**
 * Быстрая сортировка Хоара через рекурсию
 *
 * @param array $array
 * @param integer $leftBorder
 * @param integer $rightBorder
 * @return void
 */
function fastSortHoar(array &$array, int $leftBorder, int $rightBorder) : void
{
    if ($leftBorder < $rightBorder) {
        
        $left = $leftBorder;
        $right = $rightBorder;
        $main = $array[$left];

        do {

            while ($array[$right] > $main) {
                $right--;
            }
            
            if ($left <= $right) {
                $tmp = $array[$left];
                $array[$left] = $array[$right];
                $array[$right] = $tmp;
                $left++;
            }
            
            while ($array[$left] < $main) {
                $left++;
            }
        
            if ($left <= $right) {
                $tmp = $array[$left];
                $array[$left] = $array[$right];
                $array[$right] = $tmp;
                $right--;
            }

        } while ($left <= $right);

        fastSortHoar($array, $left, $rightBorder);
        fastSortHoar($array, $leftBorder, $right);

    }
}

/**
 * Нахождение максимальной подстроки в двух строках.
 *
 * @param string $a
 * @param string $b
 * @return string
 */
function maxString(string $a, string $b) : string {
    $c = ""; // подстрока
    $max = ""; // макс. подстрока
    $maxCount = 0; // Кол. элементов в наибольшей найденной подстроке
    $count = 0; // кол. элементов в подстроке
    for ($i=0; isset($a[$i]) == true; $i++) { // isset конструкция языка, а не функция. Так как мы не знаем сколько элементов в строке, то когда строка закончится выкинет false
        for ($j=0; isset($b[$j]) == true; $j++) { 
            if ($a[$i] == $b[$j]) { // нашли одинаковые элементы в строках
                echo $a[$i] . " : " . $b[$j] . "\n";
                $a_i = $i;
                $b_j = $j;
                do { // проходим дальше если следующие элементы совпадают
                    $c .= $b[$b_j]; // добавляем элемент в подстроку
                    echo $c . "\n";
                    $a_i++;
                    $b_j++;
                    $count++; // считаем кол. элем. в подстроке
    
                } while (($a[$a_i] == $b[$b_j]) && isset($a[$a_i]) && isset($b[$b_j]));
            }
    
            if ($count > $maxCount) { // сравниваем кол. элементов в подстроках
                $maxCount = $count;
                $max = $c;
                echo "Максимальное: " . $max . ' ' . $maxCount . "\n";
            }
    
            $c = "";
            $count = 0;
        }
    }
    
    return $max;
}