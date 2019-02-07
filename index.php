<?php
    $filename = "report" . date('d-m-Y_his') . ".xls";

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $data = [
        ['name' => 'João', 'age' => 22, 'genre' => 'Masculino'],
        ['name' => 'Paulo', 'age' => 17, 'genre' => 'Masculino'],
        ['name' => 'Ana', 'age' => 33, 'genre' => 'Feminino'],
        ['name' => 'Maria', 'age' => 45, 'genre' => 'Feminino'],
        ['name' => 'Pedro', 'age' => 15, 'genre' => 'Masculino'],
    ];

    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            $report = implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }

        $report .= implode("\t", array_values($row)) . "\r\n";
    }

    echo $report;
    file_put_contents(__DIR__."/{$filename}", $report);