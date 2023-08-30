<?php
function getData() : array {
    $text = <<<TXT
    <p class="big">
    Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
    </p>
    <p class="float">
    <img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград"width="300" height="200" itemprop="image">
    <span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
    </p>
    <p>
    <i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала 
    <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). 
    Целью боевых действий советских войск являлись оборона Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
    </p>
    TXT;
    $data = mb_str_split($text, 1);
    return $data;
}

function finalText($data) : array {
    //$data = getData(); // получает массив многобитовых символов, один символ это один знак/буква/пробел из текста
    $flagTag = false;
    $flagWord = false;
    $countWords = 0;

    $finalText = [];

    foreach ($data as $i => $val) {
        if ($countWords != 29) { // проверка есть ли 29 слов
            if ($flagTag == true) { // проверка на тег 
                if ($val == '>') { // проверка конец ли тега  
                    $flagTag = false; // флаг конца тега
                    $finalText[$i] = $val;
                    continue;
                }else {
                    $finalText[$i] = $val;
                    continue;
                }
            } 
            if ($flagTag == false) { // Проверка на слова
                if ($val == '<') { //проверка начало ли тега 
                    $flagTag = true; //флаг начала тега
                    $finalText[$i] = $val;
                    continue;
                } 
                if (preg_match("/^[0-9_\-\.,!\?;:'\"«»]$/i", $val)) {
                    $finalText[$i] = $val;
                    continue;
                }
                if ((($data[$i] == ' ')&&($data[$i+1] == ' '))||(($data[$i] == ' ')&&($data[$i-1] == ' '))) { // для перевода строки
                    $finalText[$i] = $val;
                    continue;
                }
                if (($val == ' ')&&($flagWord == false)) { // слово началось
                    $flagWord = true;
                    $finalText[$i] = $val;
                    continue;
                } elseif (($val == ' ')&&($flagWord == true)) { // слово закончилось
                    $flagWord = false;
                    $finalText[$i] = $val;
                    $countWords++;
                    continue;
                }
                $flagWord = true;
                $finalText[$i] = $val;
                continue;
            } 
        } else {
            $finalText[] = '...'; // (Родина-мать одно слово, числа за слова не считаются, исключение: "2-е", так же считаются "в", "по")
            break;
        }
    }
    return $finalText;
}
    