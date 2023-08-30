<?php

function createText() : void {
    include_once 'dataProcessing.php';
    include_once 'dataOutput.php';
    $text = getData();
    $text1 = finalText($text);
    renderText($text1);
}
?>