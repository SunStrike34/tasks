<?php
function RenderRows(array $grade) : void { 
    echo "<tbody> ";
    foreach ($grade as $key => $value) {
        echo "<tr><td>$key</td> ";
        for ($i=0; $i < count($value); $i++) { 
            if (is_string($value[$i])) {
                $value[$i] = '';
            }
            echo "<td>$value[$i]</td> ";
        }
        echo "</tr>";
    }
    echo "</tbody> ";
}

function RenderColumnLabels(array $data) : void {  
    echo "<thead><tr><th>Фамилии\Предметы</th> ";
    foreach ($data as $value) {
        echo "<th>$value</th> ";
    }
    echo "</tr></thead> ";
}