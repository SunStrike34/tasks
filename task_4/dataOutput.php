<?php
    include_once 'dataProcessing.php';

    $data = getData(); // получает массив многобитовых символов, каждый один символ это один знак/буква/пробел из текста
    $flag_tag = false;
    $flag_word = false;
    $count_words = 0;

    foreach ($data as $i => $val) {
        if ($count_words != 29) { // проверка есть ли 29 слов
            if ($flag_tag == true) { // проверка на тег 
                if ($val == '>') { // проверка конец ли тега  
                    $flag_tag = false; // флаг конца тега
                    echo $val;
                    continue;
                }else {
                    echo $val;
                    continue;
                }
            } 
            if ($flag_tag == false) { // Проверка на слова
                if ($val == '<') { //проверка начало ли тега 
                    $flag_tag = true; //флаг начала тега
                    echo $val;
                    continue;
                } 
                if (preg_match("/^[0-9_\-\.,!\?;:'\"«»]$/i", $val)) {
                    echo $val;
                    continue;
                }
                if ((($data[$i] == ' ')&&($data[$i+1] == ' '))||(($data[$i] == ' ')&&($data[$i-1] == ' '))) { // для перевода строки
                    echo $val;
                    continue;
                }
                if (($val == ' ')&&($flag_word == false)) { // слово началось
                    $flag_word = true;
                    echo $val;
                    continue;
                } elseif (($val == ' ')&&($flag_word == true)) { // слово закончилось
                    $flag_word = false;
                    echo $val;
                    $count_words++;
                    continue;
                }
                $flag_word = true;
                echo $val;
                continue;
            } 
        } else {
            echo '...'; // (Родина-мать одно слово)
            break;
        }
    }