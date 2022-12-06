<!-- http://localhost:8088/unix.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Команды</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
        body {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php
    // Список комманд
    $command_list = array('id', 'ls .', 'echo Hello !', 'file style.css', 'cat init.sql');
    foreach ($command_list as $cmd) {
        print_cmd($cmd);
    }

    // Запуск и вывод команды
    function print_cmd($cmd)
    {
        $lines = array();
        exec($cmd, $lines);
        echo "<p>> " . $cmd . "</p>";
        echo "<pre>" . implode("\n", $lines) . "</pre>";
    }
    ?>
</body>

</html>