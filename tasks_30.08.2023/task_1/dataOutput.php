<?php
function renderRows(string $rows) : void { 
    echo($rows);
}

function renderColumnLabels(array $columns) : void {
    foreach ($columns as $column) {
        print_r($column);
    }  
}