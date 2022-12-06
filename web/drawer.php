<!-- http://localhost:8088/drawer.php?num=09992 -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Фигуры</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
        svg>rect,
        svg>polygon,
        svg>circle {
            stroke: black;
            stroke-width: 1px;
        }

        body {
            font-size: 24px;
        }

        svg {
            height: 500px;
            width: 500px;
        }
    </style>
</head>

<body onload="runner()">
    <?php
    if (isset($_GET['num'])) {
        $num = $_GET['num']; // Получение переменной
        
        $shape = $num[0]; // 0-круг 1-прямоуг 2-квадр 3-треуг
        $red = $num[1];
        $green = $num[2];
        $blue =  $num[3];
        $size =  $num[4];
       
        $color = '"#'
            . ($red == 1    ? 'ff' : "00")
            . ($green == 1  ? 'ff' : "00")
            . ($blue == 1   ? 'ff' : "00") . '"';
        
        $size = $size * 100;

        $shape_tag = '';
        switch ($shape) {
            case 0: // Круг
                $radius = ($size / 2);
                $shape_tag = "circle "
                    // Размер
                    . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                    // Радиус
                    . " r=" . $radius . " ";
                break;
            case 1: // Прямоугольник
                $shape_tag = "rect "
                    // Размер
                    . "width=" . ($size * 2) . " height=" . ($size);
                break;
            case 2: // Квадрат
                $shape_tag = "rect "
                    // Размер
                    . "width=" . ($size) . " height=" . ($size);
                break;
            case 3: // Треугольник
                $side = $size;
                $shape_tag = "polygon points='"
                    // Точки
                    . ($side / 2 + 5) . ",10"
                    . " 10," . ($side) . " "
                    . ($side) . "," . ($side) . "'";
                break;
            default:
            echo "Неверное зачение";
        }
        echo '<svg>';
        echo '<' . $shape_tag . ' fill=' . $color . '  />';
        echo '</svg>';
    } else {
        echo '<p>Отсутствует переменная: ?num=</p>';
    }
    ?>
</body>

</html>