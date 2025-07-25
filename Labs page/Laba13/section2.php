<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №14</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            color: #333;
        }

        .task {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .task h3 {
            color: #007BFF;
            margin-top: 0;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        .column {
            width: 33.33%;
            padding: 10px;
            vertical-align: top;
        }

        .column-title {
            color: #007BFF;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .active-form {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        .result-display {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            min-height: 100px;
            border: 1px solid #ddd;
        }

        .code-block {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: "Courier New", Courier, monospace;
            font-size: 12px;
            border: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"],
        select {
            background-color: #fff;
            border: 1px solid #ddd;
            color: #333;
            padding: 8px;
            border-radius: 4px;
            width: 200px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="back-button">
        <button onclick="window.location.href='lab14.html';">Назад</button>
    </div>
    <h1>Лабораторная работа №14 - PHP Практические задания</h1>

    <!-- Задание 6 -->
    <div class="task">
        <h3>6. Сумма чисел с ползунками</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num11">Число 1:</label>
                                <input type="range" id="num11" name="num11" min="0" max="100" value="0" required oninput="updateValue('num11', 'num11-value')">
                                <span id="num11-value">0</span>
                            </div>
                            <div class="form-group">
                                <label for="num12">Число 2:</label>
                                <input type="range" id="num12" name="num12" min="0" max="100" value="0" required oninput="updateValue('num12', 'num12-value')">
                                <span id="num12-value">0</span>
                            </div>
                            <button type="submit" name="task6">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task6'])) {
                            $num11 = $_POST['num11'];
                            $num12 = $_POST['num12'];
                            $sum = $num11 + $num12;
                            echo "Сумма: $sum";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if (isset($_POST['task6'])) {
        $num11 = $_POST['num11'];
        $num12 = $_POST['num12'];
        $sum = $num11 + $num12;
        echo "Сумма: $sum";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 7 -->
    <div class="task">
        <h3>7. Шаговые числовые поля</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num13">Число 1:</label>
                                <input type="number" id="num13" name="num13" step="0.1" required>
                            </div>
                            <div class="form-group">
                                <label for="num14">Число 2:</label>
                                <input type="number" id="num14" name="num14" step="0.1" required>
                            </div>
                            <button type="submit" name="task7">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task7'])) {
                            $num13 = $_POST['num13'];
                            $num14 = $_POST['num14'];
                            $sum = $num13 + $num14;
                            echo "Сумма: $sum";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task7'])) {
    $num13 = $_POST['num13'];
    $num14 = $_POST['num14'];
    $sum = $num13 + $num14;
    echo "Сумма: $sum";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 8 -->
    <div class="task">
        <h3>8. Скрытое поле для операции</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num15">Число 1:</label>
                                <input type="number" id="num15" name="num15" required>
                            </div>
                            <div class="form-group">
                                <label for="num16">Число 2:</label>
                                <input type="number" id="num16" name="num16" required>
                            </div>
                            <input type="hidden" name="operation3" value="power">
                            <button type="submit" name="task8">Возвести в степень</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task8'])) {
                            $num15 = $_POST['num15'];
                            $num16 = $_POST['num16'];
                            $result = pow($num15, $num16);
                            echo "Результат: $result";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task8'])) {
    $num15 = $_POST['num15'];
    $num16 = $_POST['num16'];
    $result = pow($num15, $num16);
    echo "Результат: $result";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 9 -->
    <div class="task">
        <h3>9. Вычисление математического выражения</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="expression">Выражение:</label>
                                <textarea id="expression" name="expression" rows="4" required></textarea>
                            </div>
                            <button type="submit" name="task9">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task9'])) {
                            $expression = $_POST['expression'];
                            $result = eval("return $expression;");
                            echo "Результат: $result";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task9'])) {
    $expression = $_POST['expression'];
    $result = eval("return $expression;");
    echo "Результат: $result";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 10 -->
    <div class="task">
        <h3>10. Смешивание цветов</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="color1">Цвет 1:</label>
                                <input type="color" id="color1" name="color1" required>
                            </div>
                            <div class="form-group">
                                <label for="color2">Цвет 2:</label>
                                <input type="color" id="color2" name="color2" required>
                            </div>
                            <button type="submit" name="task10">Смешать цвета</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task10'])) {
                            $color1 = $_POST['color1'];
                            $color2 = $_POST['color2'];
                            $mixedColor = mixColors($color1, $color2);
                            echo "<div style='width: 100px; height: 100px; background-color: $mixedColor;'></div>";
                        }

                        function mixColors($color1, $color2) {
                            $r1 = hexdec(substr($color1, 1, 2));
                            $g1 = hexdec(substr($color1, 3, 2));
                            $b1 = hexdec(substr($color1, 5, 2));

                            $r2 = hexdec(substr($color2, 1, 2));
                            $g2 = hexdec(substr($color2, 3, 2));
                            $b2 = hexdec(substr($color2, 5, 2));

                            $r = intval(($r1 + $r2) / 2);
                            $g = intval(($g1 + $g2) / 2);
                            $b = intval(($b1 + $b2) / 2);

                            return sprintf("#%02x%02x%02x", $r, $g, $b);
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task10'])) {
    $color1 = $_POST['color1'];
    $color2 = $_POST['color2'];
    $mixedColor = mixColors($color1, $color2);
    echo "&lt;div style='width: 100px; height: 100px; background-color: $mixedColor;'&gt;&lt;/div&gt;";
}

function mixColors($color1, $color2) {
    $r1 = hexdec(substr($color1, 1, 2));
    $g1 = hexdec(substr($color1, 3, 2));
    $b1 = hexdec(substr($color1, 5, 2));

    $r2 = hexdec(substr($color2, 1, 2));
    $g2 = hexdec(substr($color2, 3, 2));
    $b2 = hexdec(substr($color2, 5, 2));

    $r = intval(($r1 + $r2) / 2);
    $g = intval(($g1 + $g2) / 2);
    $b = intval(($b1 + $b2) / 2);

    return sprintf("#%02x%02x%02x", $r, $g, $b);
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    
   <!-- JavaScript для обновления значений ползунков -->
   <script>
       function updateValue(inputId, spanId) {
           // Получаем значение ползунка
           const value = document.getElementById(inputId).value;
           // Обновляем текст рядом с ползунком
           document.getElementById(spanId).textContent = value;
       }

       // Инициализация значений при загрузке страницы
       document.addEventListener('DOMContentLoaded', function () {
           updateValue('num11', 'num11-value');
           updateValue('num12', 'num12-value');
       });
   </script>

</body>
</html>