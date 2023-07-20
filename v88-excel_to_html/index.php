<?php
ini_set('auto_detect_line_endings', true);
$file = fopen('/Applications/MAMP/htdocs/exceltohtml/us-500.csv', 'r');
$row_count = 0;
?>

<html>

<head>
    <title>Excel to PHP</title>
    <style>
        table td {
            text-align: center;
            padding: .5rem;
            border: .1rem solid #000;
        }

        .gray {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <table cellspacing=0>
        <?php while (($line = fgetcsv($file)) !== false) { ?> <tr <?= ($row_count % 10 == 0) ? 'class="gray"' : '' ?>>
                <td><?= $line[0] ?></td>
                <td><?= $line[1] ?></td>
                <td><?= $line[2] ?></td>
                <td><?= ($row_count == 0) ? "full_address" : $line[3] . ", " . $line[4] . ", " . $line[5] . ", " . $line[6] . ", " . $line[7] ?></td>
                <td><?= $line[8] ?></td>
                <td><?= $line[9] ?></td>
                <td><?= ($row_count == 0) ? "emaill_address" : $line[10] ?></td>
                <td><?= $line[11] ?></td>
            </tr>
        <?php $row_count++;
        } ?>
    </table>
    <?= fclose($file); ?>
</body>

</html>