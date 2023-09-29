<?php

function truncateText($characterArray) : array // получает массив многобитовых символов, один символ это один знак/буква/пробел из текста
{

    $flagTag = false; // флаг для определения того, что начался или закончился тег, false - не начался, true - закончился
    $flagWord = false; // флаг для определения того, что началось или закончилось слово, false - не началось, true - закончилось
    $countWords = 0;

    $text = [];

    foreach ($characterArray as $idCharacter => $character) {
        if ($countWords != 29) { // проверка есть ли 29 слов

            if ($flagTag == true) { // проверка на тег 
                if ($character == '>') { // проверка конец ли тега  
                    $flagTag = false; // флаг конца тега
                }
                $text[$idCharacter] = $character;
                continue;
            }

            if ($flagTag == false) { // Проверка на слова
                if ($character == '<') { //проверка начало ли тега 
                    $flagTag = true; //флаг начала тега
                    $text[$idCharacter] = $character;
                    continue;
                }
                if (($characterArray[$idCharacter] == ' ')&&(($characterArray[$idCharacter+1] == ' ')
                ||(($characterArray[$idCharacter-1] == ' ')))||preg_match("/^[0-9_\-\.,!\?;:'\"«»]$/i", $character)) { // для перевода строки, знаков препинания и чисел
                    $text[$idCharacter] = $character;
                    continue;
                }
                if(($character == ' ')&&($flagWord == true)){
                    $flagWord = false; // слово закончилось
                    $countWords++;
                    $text[$idCharacter] = $character;
                    continue;
                }

                $flagWord = true; // слово началось
                $text[$idCharacter] = $character;
                continue;
            }
        } else {
            $text[] = '...'; // (Родина-мать одно слово, числа за слова не считаются, исключение: "2-е", так же считаются "в", "по" и "г.")
            break;
        }
    }

    return $text;
}
    