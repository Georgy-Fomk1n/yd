<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №13 - PHP Практические задания</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            color: #333; /* Основной цвет текста */
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
            color: #007BFF; /* Акцентный цвет для заголовков */
            margin-top: 0;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .result {
            background-color: #f8f8f8;
            padding: 10px;
            border-left: 4px solid #007BFF;
            margin-top: 10px;
            border-radius: 5px;
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

        h1 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 30px;
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

        .code-block {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: "Courier New", Courier, monospace;
            font-size: 12px;
            border: 1px solid #ddd;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        ul li:last-child {
            border-bottom: none;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"] {
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

        .output {
            margin-top: 15px;
            padding: 10px;
            background-color: #f8f8f8;
            border-radius: 4px;
            border: 1px solid #ddd;
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
    </style>
</head>
<body>
    <h1>Лабораторная работа №13 - PHP Практические задания</h1>

    <!-- Задание 1 -->
    <div class="task">
        <h3>1. Базовый вывод информации</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="name">Имя:</label><br>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Возраст:</label><br>
                                <input type="number" id="age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="hobby">Хобби:</label><br>
                                <input type="text" id="hobby" name="hobby" required>
                            </div>
                            <button type="submit" name="task1">Показать информацию</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task1'])) {
                            $name = htmlspecialchars($_POST['name']);
                            $age = (int)$_POST['age'];
                            $hobby = htmlspecialchars($_POST['hobby']);
                            
                            echo "<ul>
                                <li>Имя: $name</li>
                                <li>Возраст: $age</li>
                                <li>Хобби: $hobby</li>
                            </ul>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if(isset($_POST['task1'])) {
    $name = htmlspecialchars($_POST['name']);
    $age = (int)$_POST['age'];
    $hobby = htmlspecialchars($_POST['hobby']);
    
    echo "&lt;ul&gt;
        &lt;li&gt;Имя: $name&lt;/li&gt;
        &lt;li&gt;Возраст: $age&lt;/li&gt;
        &lt;li&gt;Хобби: $hobby&lt;/li&gt;
    &lt;/ul&gt;";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 2 -->
<div class="task">
    <h3>2. Переменные и типы данных</h3>
    <table>
        <tr>
            <td class="column">
                <div class="column-title">Ввод данных</div>
                <div class="active-form">
                    <form method="POST" action="" >
                        <div class="form-group">
                            <label for="integer">Целое число:</label><br>
                            <input type="number" id="integer" name="integer" required>
                        </div>
                        <div class="form-group">
                            <label for="string">Строка:</label><br>
                            <input type="text" id="string" name="string" required>
                        </div>
                        <div class="form-group">
                            <label for="array">Массив (числа через запятую):</label><br>
                            <input type="text" id="array" name="array" required>
                        </div>
                        <div class="form-group">
                            <label for="boolean">Булево значение:</label><br>
                            <select id="boolean" name="boolean" required>
                                <option value="1">true</option>
                                <option value="0">false</option>
                            </select>
                        </div>
                        <button type="submit" name="task2">Показать типы данных</button>
                    </form>
                </div>
            </td>
            <td class="column">
                <div class="column-title">Результат</div>
                <div class="result-display">
                    <?php
                    if (isset($_POST['task2'])) {
                        $integer = (int)$_POST['integer'];
                        $string = htmlspecialchars($_POST['string']);
                        $array = array_map('intval', explode(',', $_POST['array']));
                        $boolean = (bool)$_POST['boolean'];
                        $null = null;

                        echo "<ul>
                            <li>Целое число: $integer (" . gettype($integer) . ")</li>
                            <li>Строка: $string (" . gettype($string) . ")</li>
                            <li>Массив: " . print_r($array, true) . " (" . gettype($array) . ")</li>
                            <li>Булево: " . ($boolean ? 'true' : 'false') . " (" . gettype($boolean) . ")</li>
                            <li>NULL: " . var_export($null, true) . " (" . gettype($null) . ")</li>
                        </ul>";
                    }
                    ?>
                </div>
            </td>
            <td class="column">
                <div class="column-title">Код</div>
                <div class="code-block">
                    <pre>
if(isset($_POST['task2'])) {
    $integer = (int)$_POST['integer'];
    $string = htmlspecialchars($_POST['string']);
    $array = array_map('intval', explode(',', $_POST['array']));
    $boolean = (bool)$_POST['boolean'];
    $null = null;

    echo "&lt;ul&gt;
        &lt;li&gt;Целое число: $integer (" . gettype($integer) . ")&lt;/li&gt;
        &lt;li&gt;Строка: $string (" . gettype($string) . ")&lt;/li&gt;
        &lt;li&gt;Массив: " . print_r($array, true) . " (" . gettype($array) . ")&lt;/li&gt;
        &lt;li&gt;Булево: " . ($boolean ? 'true' : 'false') . " (" . gettype($boolean) . ")&lt;/li&gt;
        &lt;li&gt;NULL: " . var_export($null, true) . " (" . gettype($null) . ")&lt;/li&gt;
    &lt;/ul&gt;";
}
                    </pre>
                </div>
            </td>
        </tr>
    </table>
</div>

    <!-- Задание 3 -->
    <div class="task">
        <h3>3. Арифметические операции</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num1">Первое число:</label><br>
                                <input type="number" id="num1" name="num1" required>
                            </div>
                            <div class="form-group">
                                <label for="num2">Второе число:</label><br>
                                <input type="number" id="num2" name="num2" required>
                            </div>
                            <button type="submit" name="task3">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task3'])) {
                            $num1 = (float)$_POST['num1'];
                            $num2 = (float)$_POST['num2'];
                            
                            echo "<ul>
                                <li>Числа: $num1 и $num2</li>
                                <li>Сложение: " . ($num1 + $num2) . "</li>
                                <li>Вычитание: " . ($num1 - $num2) . "</li>
                                <li>Умножение: " . ($num1 * $num2) . "</li>
                                <li>Деление: " . ($num2 != 0 ? $num1 / $num2 : 'Деление на ноль невозможно') . "</li>
                            </ul>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task3'])) {
        $num1 = (float)$_POST['num1'];
        $num2 = (float)$_POST['num2'];
        
        echo "&lt;ul&gt;
            &lt;li&gt;Числа: $num1 и $num2&lt;/li&gt;
            &lt;li&gt;Сложение: " . ($num1 + $num2) . "&lt;/li&gt;
            &lt;li&gt;Вычитание: " . ($num1 - $num2) . "&lt;/li&gt;
            &lt;li&gt;Умножение: " . ($num1 * $num2) . "&lt;/li&gt;
            &lt;li&gt;Деление: " . ($num2 != 0 ? $num1 / $num2 : 'Деление на ноль невозможно') . "&lt;/li&gt;
        &lt;/ul&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 4 -->
    <div class="task">
        <h3>4. Логические операторы (Високосный год)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="" >
                            <div class="form-group">
                                <label for="year">Введите год:</label><br>
                                <input type="number" id="year" name="year" min="1" required>
                            </div>
                            <button type="submit" name="task4">Проверить год</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task4'])) {
                            function isLeapYear($year) {
                                return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
                            }

                            $year = (int)$_POST['year'];
                            echo "$year год: " . (isLeapYear($year) ? "високосный" : "не високосный");
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function isLeapYear($year) {
        return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
    }

    if(isset($_POST['task4'])) {
        $year = (int)$_POST['year'];
        echo "$year год: " . (isLeapYear($year) ? "високосный" : "не високосный");
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 5 -->
    <div class="task">
        <h3>5. Условные конструкции (Возрастная категория)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="person_age">Введите возраст:</label><br>
                                <input type="number" id="person_age" name="person_age" min="0" max="150" required>
                            </div>
                            <button type="submit" name="task5">Определить категорию</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task5'])) {
                            function getAgeCategory($age) {
                                if ($age < 12) return "ребенок";
                                if ($age < 18) return "подросток";
                                if ($age < 65) return "взрослый";
                                return "пожилой";
                            }

                            $age = (int)$_POST['person_age'];
                            echo "Возраст $age лет: " . getAgeCategory($age);
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function getAgeCategory($age) {
        if ($age < 12) return "ребенок";
        if ($age < 18) return "подросток";
        if ($age < 65) return "взрослый";
        return "пожилой";
    }

    if(isset($_POST['task5'])) {
        $age = (int)$_POST['person_age'];
        echo "Возраст $age лет: " . getAgeCategory($age);
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <!-- Задание 6 -->
    <div class="task">
        <h3>6. Тернарный оператор (Четное/нечетное)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="check_number">Введите число:</label><br>
                                <input type="number" id="check_number" name="check_number" required>
                            </div>
                            <button type="submit" name="task6">Проверить число</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task6'])) {
                            $num = (int)$_POST['check_number'];
                            echo "$num - " . ($num % 2 == 0 ? "четное" : "нечетное");
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task6'])) {
        $num = (int)$_POST['check_number'];
        echo "$num - " . ($num % 2 == 0 ? "четное" : "нечетное");
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <!-- Задание 7 -->
    <div class="task">
        <h3>7. Оператор switch (Месяцы)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="" >
                            <div class="form-group">
                                <label for="month">Выберите номер месяца:</label><br>
                                <input type="number" id="month" name="month" min="1" max="12" required>
                            </div>
                            <button type="submit" name="task7">Показать месяц</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task7'])) {
                            function getMonthName($month) {
                                switch ($month) {
                                    case 1: return "Январь";
                                    case 2: return "Февраль";
                                    case 3: return "Март";
                                    case 4: return "Апрель";
                                    case 5: return "Май";
                                    case 6: return "Июнь";
                                    case 7: return "Июль";
                                    case 8: return "Август";
                                    case 9: return "Сентябрь";
                                    case 10: return "Октябрь";
                                    case 11: return "Ноябрь";
                                    case 12: return "Декабрь";
                                    default: return "Неверный месяц";
                                }
                            }

                            $month = (int)$_POST['month'];
                            echo "Месяц №$month - " . getMonthName($month);
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function getMonthName($month) {
        switch ($month) {
            case 1: return "Январь";
            case 2: return "Февраль";
            case 3: return "Март";
            case 4: return "Апрель";
            case 5: return "Май";
            case 6: return "Июнь";
            case 7: return "Июль";
            case 8: return "Август";
            case 9: return "Сентябрь";
            case 10: return "Октябрь";
            case 11: return "Ноябрь";
            case 12: return "Декабрь";
            default: return "Неверный месяц";
        }
    }

    if(isset($_POST['task7'])) {
        $month = (int)$_POST['month'];
        echo "Месяц №$month - " . getMonthName($month);
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 8 -->
    <div class="task">
        <h3>8. Цикл while (Числа, делящиеся на 3)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="max_number">Введите максимальное число:</label><br>
                                <input type="number" id="max_number" name="max_number" min="1" required>
                            </div>
                            <button type="submit" name="task8">Найти числа</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task8'])) {
                            $max = (int)$_POST['max_number'];
                            $i = 1;
                            $numbers = [];
                            
                            while ($i <= $max) {
                                if ($i % 3 == 0) {
                                    $numbers[] = $i;
                                }
                                $i++;
                            }
                            
                            echo "<p>Числа от 1 до $max, делящиеся на 3:</p>";
                            echo "<p>" . implode(", ", $numbers) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task8'])) {
        $max = (int)$_POST['max_number'];
        $i = 1;
        $numbers = [];
        
        while ($i <= $max) {
            if ($i % 3 == 0) {
                $numbers[] = $i;
            }
            $i++;
        }
        
        echo "&lt;p&gt;Числа от 1 до $max, делящиеся на 3:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $numbers) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 9 -->
    <div class="task">
        <h3>9. Цикл do-while (Числа в обратном порядке)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="start_number">Введите начальное число:</label><br>
                                <input type="number" id="start_number" name="start_number" min="1" required>
                            </div>
                            <button type="submit" name="task9">Показать числа</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task9'])) {
                            $start = (int)$_POST['start_number'];
                            $i = $start;
                            $numbers = [];
                            
                            do {
                                $numbers[] = $i;
                                $i--;
                            } while ($i >= 1);
                            
                            echo "<p>Числа от $start до 1 в обратном порядке:</p>";
                            echo "<p>" . implode(", ", $numbers) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task9'])) {
        $start = (int)$_POST['start_number'];
        $i = $start;
        $numbers = [];
        
        do {
            $numbers[] = $i;
            $i--;
        } while ($i >= 1);
        
        echo "&lt;p&gt;Числа от $start до 1 в обратном порядке:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $numbers) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

     <!-- Задание 10 -->
    <div class="task">
        <h3>10. Цикл for (Таблица умножения)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="" >
                            <div class="form-group">
                                <label for="table_size">Введите размер таблицы:</label><br>
                                <input type="number" id="table_size" name="table_size" min="1" max="10" required>
                            </div>
                            <button type="submit" name="task10">Показать таблицу</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task10'])) {
                            $size = (int)$_POST['table_size'];
                            echo "<p>Таблица умножения $size x $size:</p>";
                            echo "<table class='multiplication-table'>";
                            echo "<tr><th></th>";
                            for ($i = 1; $i <= $size; $i++) {
                                echo "<th>$i</th>";
                            }
                            echo "</tr>";
                            for ($i = 1; $i <= $size; $i++) {
                                echo "<tr><th>$i</th>";
                                for ($j = 1; $j <= $size; $j++) {
                                    echo "<td>" . ($i * $j) . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task10'])) {
        $size = (int)$_POST['table_size'];
        echo "&lt;p&gt;Таблица умножения $size x $size:&lt;/p&gt;";
        echo "&lt;table class='multiplication-table'&gt;";
        echo "&lt;tr&gt;&lt;th&gt;&lt;/th&gt;";
        for ($i = 1; $i <= $size; $i++) {
            echo "&lt;th&gt;$i&lt;/th&gt;";
        }
        echo "&lt;/tr&gt;";
        for ($i = 1; $i <= $size; $i++) {
            echo "&lt;tr&gt;&lt;th&gt;$i&lt;/th&gt;";
            for ($j = 1; $j <= $size; $j++) {
                echo "&lt;td&gt;" . ($i * $j) . "&lt;/td&gt;";
            }
            echo "&lt;/tr&gt;";
        }
        echo "&lt;/table&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <!-- Задание 11 -->
    <div class="task">
        <h3>11. Цикл foreach (Сумма элементов массива)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="" >
                            <div class="form-group">
                                <label for="array_elements">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="array_elements" name="array_elements" required>
                            </div>
                            <button type="submit" name="task11">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task11'])) {
                            $elements = array_map('intval', explode(',', $_POST['array_elements']));
                            $sum = 0;
                            foreach ($elements as $element) {
                                $sum += $element;
                            }
                            echo "<p>Элементы массива: " . implode(", ", $elements) . "</p>";
                            echo "<p>Сумма элементов: $sum</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task11'])) {
        $elements = array_map('intval', explode(',', $_POST['array_elements']));
        $sum = 0;
        foreach ($elements as $element) {
            $sum += $element;
        }
        echo "&lt;p&gt;Элементы массива: " . implode(", ", $elements) . "&lt;/p&gt;";
        echo "&lt;p&gt;Сумма элементов: $sum&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 12 -->
    <div class="task">
        <h3>12. Функции (Проверка на простое число)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="prime_number">Введите число:</label><br>
                                <input type="number" id="prime_number" name="prime_number" min="2" required>
                            </div>
                            <button type="submit" name="task12">Проверить число</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task12'])) {
                            function isPrime($num) {
                                if ($num < 2) return false;
                                for ($i = 2; $i <= sqrt($num); $i++) {
                                    if ($num % $i == 0) return false;
                                }
                                return true;
                            }

                            $number = (int)$_POST['prime_number'];
                            echo "<p>Число $number: " . (isPrime($number) ? "простое" : "не простое") . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function isPrime($num) {
        if ($num < 2) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    if(isset($_POST['task12'])) {
        $number = (int)$_POST['prime_number'];
        echo "&lt;p&gt;Число $number: " . (isPrime($number) ? "простое" : "не простое") . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 13 -->
    <div class="task">
        <h3>13. Функции (Палиндром)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="palindrome_string">Введите строку:</label><br>
                                <input type="text" id="palindrome_string" name="palindrome_string" required>
                            </div>
                            <button type="submit" name="task13">Проверить строку</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task13'])) {
                            function isPalindrome($str) {
                                $str = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $str));
                                return $str == strrev($str);
                            }

                            $string = htmlspecialchars($_POST['palindrome_string']);
                            echo "<p>Строка \"$string\": " . (isPalindrome($string) ? "палиндром" : "не палиндром") . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function isPalindrome($str) {
        $str = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $str));
        return $str == strrev($str);
    }

    if(isset($_POST['task13'])) {
        $string = htmlspecialchars($_POST['palindrome_string']);
        echo "&lt;p&gt;Строка \"$string\": " . (isPalindrome($string) ? "палиндром" : "не палиндром") . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 14 -->
    <div class="task">
        <h3>14. Функции (Среднее значение)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="average_numbers">Введите числа через запятую:</label><br>
                                <input type="text" id="average_numbers" name="average_numbers" required>
                            </div>
                            <button type="submit" name="task14">Вычислить среднее</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task14'])) {
                            function calculateAverage($numbers) {
                                return array_sum($numbers) / count($numbers);
                            }

                            $numbers = array_map('floatval', explode(',', $_POST['average_numbers']));
                            echo "<p>Числа: " . implode(", ", $numbers) . "</p>";
                            echo "<p>Среднее значение: " . calculateAverage($numbers) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    function calculateAverage($numbers) {
        return array_sum($numbers) / count($numbers);
    }

    if(isset($_POST['task14'])) {
        $numbers = array_map('floatval', explode(',', $_POST['average_numbers']));
        echo "&lt;p&gt;Числа: " . implode(", ", $numbers) . "&lt;/p&gt;";
        echo "&lt;p&gt;Среднее значение: " . calculateAverage($numbers) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 15 -->
    <div class="task">
        <h3>15. Массивы (Сортировка)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="sort_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="sort_array" name="sort_array" required>
                            </div>
                            <button type="submit" name="task15">Отсортировать</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task15'])) {
                            $array = array_map('intval', explode(',', $_POST['sort_array']));
                            sort($array);
                            echo "<p>Отсортированный массив: " . implode(", ", $array) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task15'])) {
        $array = array_map('intval', explode(',', $_POST['sort_array']));
        sort($array);
        echo "&lt;p&gt;Отсортированный массив: " . implode(", ", $array) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 16 -->
    <div class="task">
        <h3>16. Массивы (Поиск максимального значения)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="max_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="max_array" name="max_array" required>
                            </div>
                            <button type="submit" name="task16">Найти максимальное значение</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task16'])) {
                            $array = array_map('intval', explode(',', $_POST['max_array']));
                            $max = max($array);
                            echo "<p>Массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Максимальное значение: $max</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task16'])) {
        $array = array_map('intval', explode(',', $_POST['max_array']));
        $max = max($array);
        echo "&lt;p&gt;Массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Максимальное значение: $max&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 17 -->
    <div class="task">
        <h3>17. Массивы (Поиск минимального значения)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="min_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="min_array" name="min_array" required>
                            </div>
                            <button type="submit" name="task17">Найти минимальное значение</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task17'])) {
                            $array = array_map('intval', explode(',', $_POST['min_array']));
                            $min = min($array);
                            echo "<p>Массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Минимальное значение: $min</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task17'])) {
        $array = array_map('intval', explode(',', $_POST['min_array']));
        $min = min($array);
        echo "&lt;p&gt;Массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Минимальное значение: $min&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <!-- Задание 18 -->
    <div class="task">
        <h3>18. Массивы (Поиск элемента)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="search_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="search_array" name="search_array" required>
                            </div>
                            <div class="form-group">
                                <label for="search_value">Введите значение для поиска:</label><br>
                                <input type="number" id="search_value" name="search_value" required>
                            </div>
                            <button type="submit" name="task18">Найти элемент</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task18'])) {
                            $array = array_map('intval', explode(',', $_POST['search_array']));
                            $value = (int)$_POST['search_value'];
                            $found = in_array($value, $array);
                            echo "<p>Массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Значение для поиска: $value</p>";
                            echo "<p>Результат поиска: " . ($found ? "найдено" : "не найдено") . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task18'])) {
        $array = array_map('intval', explode(',', $_POST['search_array']));
        $value = (int)$_POST['search_value'];
        $found = in_array($value, $array);
        echo "&lt;p&gt;Массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Значение для поиска: $value&lt;/p&gt;";
        echo "&lt;p&gt;Результат поиска: " . ($found ? "найдено" : "не найдено") . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 19 -->
    <div class="task">
        <h3>19. Массивы (Удаление элемента)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="delete_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="delete_array" name="delete_array" required>
                            </div>
                            <div class="form-group">
                                <label for="delete_index">Введите индекс для удаления:</label><br>
                                <input type="number" id="delete_index" name="delete_index" required>
                            </div>
                            <button type="submit" name="task19">Удалить элемент</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task19'])) {
                            $array = array_map('intval', explode(',', $_POST['delete_array']));
                            $index = (int)$_POST['delete_index'];
                            if (isset($array[$index])) {
                                unset($array[$index]);
                                echo "<p>Массив после удаления элемента:</p>";
                                echo "<p>" . implode(", ", $array) . "</p>";
                            } else {
                                echo "<p>Элемент с индексом $index не найден</p>";
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task19'])) {
        $array = array_map('intval', explode(',', $_POST['delete_array']));
        $index = (int)$_POST['delete_index'];
        if (isset($array[$index])) {
            unset($array[$index]);
            echo "&lt;p&gt;Массив после удаления элемента:&lt;/p&gt;";
            echo "&lt;p&gt;" . implode(", ", $array) . "&lt;/p&gt;";
        } else {
            echo "&lt;p&gt;Элемент с индексом $index не найден&lt;/p&gt;";
        }
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 20 -->
    <div class="task">
        <h3>20. Массивы (Добавление элемента)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="add_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="add_array" name="add_array" required>
                            </div>
                            <div class="form-group">
                                <label for="add_value">Введите значение для добавления:</label><br>
                                <input type="number" id="add_value" name="add_value" required>
                            </div>
                            <button type="submit" name="task20">Добавить элемент</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task20'])) {
                            $array = array_map('intval', explode(',', $_POST['add_array']));
                            $value = (int)$_POST['add_value'];
                            $array[] = $value;
                            echo "<p>Массив после добавления элемента:</p>";
                            echo "<p>" . implode(", ", $array) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task20'])) {
        $array = array_map('intval', explode(',', $_POST['add_array']));
        $value = (int)$_POST['add_value'];
        $array[] = $value;
        echo "&lt;p&gt;Массив после добавления элемента:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $array) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 21 -->
    <div class="task">
        <h3>21. Массивы (Объединение массивов)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="merge_array1">Введите элементы первого массива через запятую:</label><br>
                                <input type="text" id="merge_array1" name="merge_array1" required>
                            </div>
                            <div class="form-group">
                                <label for="merge_array2">Введите элементы второго массива через запятую:</label><br>
                                <input type="text" id="merge_array2" name="merge_array2" required>
                            </div>
                            <button type="submit" name="task21">Объединить массивы</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task21'])) {
                            $array1 = array_map('intval', explode(',', $_POST['merge_array1']));
                            $array2 = array_map('intval', explode(',', $_POST['merge_array2']));
                            $merged = array_merge($array1, $array2);
                            echo "<p>Объединенный массив:</p>";
                            echo "<p>" . implode(", ", $merged) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task21'])) {
        $array1 = array_map('intval', explode(',', $_POST['merge_array1']));
        $array2 = array_map('intval', explode(',', $_POST['merge_array2']));
        $merged = array_merge($array1, $array2);
        echo "&lt;p&gt;Объединенный массив:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $merged) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 22 -->
    <div class="task">
        <h3>22. Массивы (Разделение массива)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="split_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="split_array" name="split_array" required>
                            </div>
                            <div class="form-group">
                                <label for="split_size">Введите размер частей:</label><br>
                                <input type="number" id="split_size" name="split_size" min="1" required>
                            </div>
                            <button type="submit" name="task22">Разделить массив</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task22'])) {
                            $array = array_map('intval', explode(',', $_POST['split_array']));
                            $size = (int)$_POST['split_size'];
                            $parts = array_chunk($array, $size);
                            echo "<p>Разделенный массив:</p>";
                            foreach ($parts as $i => $part) {
                                echo "<p>Часть " . ($i + 1) . ": " . implode(", ", $part) . "</p>";
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task22'])) {
        $array = array_map('intval', explode(',', $_POST['split_array']));
        $size = (int)$_POST['split_size'];
        $parts = array_chunk($array, $size);
        echo "&lt;p&gt;Разделенный массив:&lt;/p&gt;";
        foreach ($parts as $i => $part) {
            echo "&lt;p&gt;Часть " . ($i + 1) . ": " . implode(", ", $part) . "&lt;/p&gt;";
        }
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 23 -->
    <div class="task">
        <h3>23. Массивы (Фильтрация)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="filter_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="filter_array" name="filter_array" required>
                            </div>
                            <div class="form-group">
                                <label for="filter_value">Введите значение для фильтрации:</label><br>
                                <input type="number" id="filter_value" name="filter_value" required>
                            </div>
                            <button type="submit" name="task23">Отфильтровать массив</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task23'])) {
                            $array = array_map('intval', explode(',', $_POST['filter_array']));
                            $value = (int)$_POST['filter_value'];
                            $filtered = array_filter($array, function($item) use ($value) {
                                return $item > $value;
                            });
                            echo "<p>Исходный массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Отфильтрованный массив (числа больше $value):</p>";
                            echo "<p>" . implode(", ", $filtered) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task23'])) {
        $array = array_map('intval', explode(',', $_POST['filter_array']));
        $value = (int)$_POST['filter_value'];
        $filtered = array_filter($array, function($item) use ($value) {
            return $item > $value;
        });
        echo "&lt;p&gt;Исходный массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Отфильтрованный массив (числа больше $value):&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $filtered) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 24 -->
    <div class="task">
        <h3>24. Массивы (Слияние массивов)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="combine_array1">Введите элементы первого массива через запятую:</label><br>
                                <input type="text" id="combine_array1" name="combine_array1" required>
                            </div>
                            <div class="form-group">
                                <label for="combine_array2">Введите элементы второго массива через запятую:</label><br>
                                <input type="text" id="combine_array2" name="combine_array2" required>
                            </div>
                            <button type="submit" name="task24">Слить массивы</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task24'])) {
                            $array1 = array_map('intval', explode(',', $_POST['combine_array1']));
                            $array2 = array_map('intval', explode(',', $_POST['combine_array2']));
                            $combined = array_combine($array1, $array2);
                            echo "<p>Слитый массив:</p>";
                            echo "<p>" . implode(", ", $combined) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task24'])) {
        $array1 = array_map('intval', explode(',', $_POST['combine_array1']));
        $array2 = array_map('intval', explode(',', $_POST['combine_array2']));
        $combined = array_combine($array1, $array2);
        echo "&lt;p&gt;Слитый массив:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $combined) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 25 -->
    <div class="task">
        <h3>25. Массивы (Уникальные значения)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="unique_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="unique_array" name="unique_array" required>
                            </div>
                            <button type="submit" name="task25">Найти уникальные значения</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task25'])) {
                            $array = array_map('intval', explode(',', $_POST['unique_array']));
                            $unique = array_unique($array);
                            echo "<p>Исходный массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Уникальные значения:</p>";
                            echo "<p>" . implode(", ", $unique) . "</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task25'])) {
        $array = array_map('intval', explode(',', $_POST['unique_array']));
        $unique = array_unique($array);
        echo "&lt;p&gt;Исходный массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Уникальные значения:&lt;/p&gt;";
        echo "&lt;p&gt;" . implode(", ", $unique) . "&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 26 -->
    <div class="task">
        <h3>26. Массивы (Подсчет элементов)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="count_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="count_array" name="count_array" required>
                            </div>
                            <button type="submit" name="task26">Подсчитать элементы</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task26'])) {
                            $array = array_map('intval', explode(',', $_POST['count_array']));
                            $counts = array_count_values($array);
                            echo "<p>Исходный массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Количество каждого элемента:</p>";
                            foreach ($counts as $value => $count) {
                                echo "<p>$value встречается $count раз(а)</p>";
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task26'])) {
        $array = array_map('intval', explode(',', $_POST['count_array']));
        $counts = array_count_values($array);
        echo "&lt;p&gt;Исходный массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Количество каждого элемента:&lt;/p&gt;";
        foreach ($counts as $value => $count) {
            echo "&lt;p&gt;$value встречается $count раз(а)&lt;/p&gt;";
        }
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 27 -->
    <div class="task">
        <h3>27. Массивы (Сумма элементов)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="sum_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="sum_array" name="sum_array" required>
                            </div>
                            <button type="submit" name="task27">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task27'])) {
                            $array = array_map('intval', explode(',', $_POST['sum_array']));
                            $sum = array_sum($array);
                            echo "<p>Исходный массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Сумма элементов: $sum</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task27'])) {
        $array = array_map('intval', explode(',', $_POST['sum_array']));
        $sum = array_sum($array);
        echo "&lt;p&gt;Исходный массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Сумма элементов: $sum&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 28 -->
    <div class="task">
        <h3>28. Массивы (Произведение элементов)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="product_array">Введите элементы массива через запятую:</label><br>
                                <input type="text" id="product_array" name="product_array" required>
                            </div>
                            <button type="submit" name="task28">Вычислить произведение</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task28'])) {
                            $array = array_map('intval', explode(',', $_POST['product_array']));
                            $product = array_product($array);
                            echo "<p>Исходный массив: " . implode(", ", $array) . "</p>";
                            echo "<p>Произведение элементов: $product</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task28'])) {
        $array = array_map('intval', explode(',', $_POST['product_array']));
        $product = array_product($array);
        echo "&lt;p&gt;Исходный массив: " . implode(", ", $array) . "&lt;/p&gt;";
        echo "&lt;p&gt;Произведение элементов: $product&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 29 -->
    <div class="task">
        <h3>29. JSON (Сохранение и чтение данных)</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="json_name">Имя:</label><br>
                                <input type="text" id="json_name" name="json_name" required>
                            </div>
                            <div class="form-group">
                                <label for="json_age">Возраст:</label><br>
                                <input type="number" id="json_age" name="json_age" required>
                            </div>
                            <div class="form-group">
                                <label for="json_city">Город:</label><br>
                                <input type="text" id="json_city" name="json_city" required>
                            </div>
                            <button type="submit" name="task29">Сохранить в JSON</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task29'])) {
                            $data = [
                                "name" => htmlspecialchars($_POST['json_name']),
                                "age" => (int)$_POST['json_age'],
                                "city" => htmlspecialchars($_POST['json_city'])
                            ];

                            $json = json_encode($data, JSON_UNESCAPED_UNICODE);
                            file_put_contents("data.json", $json);
                            
                            $readData = json_decode(file_get_contents("data.json"), true);
                            echo "<p>Данные сохранены и прочитаны из JSON:</p>";
                            echo "<p>Имя: {$readData['name']}</p>";
                            echo "<p>Возраст: {$readData['age']}</p>";
                            echo "<p>Город: {$readData['city']}</p>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
    if(isset($_POST['task29'])) {
        $data = [
            "name" => htmlspecialchars($_POST['json_name']),
            "age" => (int)$_POST['json_age'],
            "city" => htmlspecialchars($_POST['json_city'])
        ];

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents("data.json", $json);
        
        $readData = json_decode(file_get_contents("data.json"), true);
        echo "&lt;p&gt;Данные сохранены и прочитаны из JSON:&lt;/p&gt;";
        echo "&lt;p&gt;Имя: {$readData['name']}&lt;/p&gt;";
        echo "&lt;p&gt;Возраст: {$readData['age']}&lt;/p&gt;";
        echo "&lt;p&gt;Город: {$readData['city']}&lt;/p&gt;";
    }
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <h1>Контрольные вопросы по PHP</h1>

    <h2>1. Что такое PHP и каковы его основные области применения?</h2>
    <p>
        PHP (Hypertext Preprocessor) — это серверный скриптовый язык программирования, который используется для создания динамических веб-страниц. PHP код выполняется на сервере, а результат выполнения отправляется в браузер пользователя в виде HTML.
    </p>
    <p>
        Основные области применения PHP:
        <ul>
            <li>Создание динамических веб-сайтов и веб-приложений.</li>
            <li>Работа с базами данных (например, MySQL).</li>
            <li>Обработка форм и данных, отправленных пользователем.</li>
            <li>Создание API для взаимодействия с другими сервисами.</li>
            <li>Автоматизация задач на сервере.</li>
        </ul>
    </p>

    <h2>2. Какие типы данных существуют в PHP? Приведите примеры каждого типа.</h2>
    <p>
        В PHP поддерживаются следующие типы данных:
        <ul>
            <li><strong>Целые числа (integer)</strong>: <code>$num = 42;</code></li>
            <li><strong>Числа с плавающей точкой (float)</strong>: <code>$pi = 3.14;</code></li>
            <li><strong>Строки (string)</strong>: <code>$name = "John";</code></li>
            <li><strong>Логические значения (boolean)</strong>: <code>$isTrue = true;</code></li>
            <li><strong>Массивы (array)</strong>: <code>$colors = ["red", "green", "blue"];</code></li>
            <li><strong>Объекты (object)</strong>: <code>$obj = new stdClass();</code></li>
            <li><strong>NULL</strong>: <code>$var = null;</code></li>
            <li><strong>Ресурсы (resource)</strong>: <code>$file = fopen("file.txt", "r");</code></li>
        </ul>
    </p>

    <h2>3. Объясните разницу между операторами == и === в PHP.</h2>
    <p>
        Оператор <code>==</code> сравнивает значения переменных, не учитывая их типы. Например:
        <pre><code>if (5 == "5") { // true, так как значения равны }</code></pre>
        Оператор <code>===</code> сравнивает и значения, и типы переменных. Например:
        <pre><code>if (5 === "5") { // false, так как типы разные }</code></pre>
    </p>

    <h2>4. Какие циклы существуют в PHP? В каких случаях лучше использовать тот или иной цикл?</h2>
    <p>
        В PHP существуют следующие циклы:
        <ul>
            <li><strong>for</strong>: Используется, когда известно количество итераций.</li>
            <li><strong>while</strong>: Используется, когда количество итераций неизвестно, но есть условие для продолжения.</li>
            <li><strong>do-while</strong>: Похож на <code>while</code>, но выполняется хотя бы один раз.</li>
            <li><strong>foreach</strong>: Используется для перебора элементов массива.</li>
        </ul>
    </p>

    <h2>5. Что такое ассоциативный массив в PHP? Как создать многомерный массив?</h2>
    <p>
        Ассоциативный массив — это массив, в котором ключи являются строками. Например:
        <pre><code>$person = ["name" => "John", "age" => 30];</code></pre>
        Многомерный массив — это массив, содержащий другие массивы. Например:
        <pre><code>$users = [
    ["name" => "John", "age" => 30],
    ["name" => "Jane", "age" => 25]
];</code></pre>
    </p>

    <h2>6. Как работает область видимости переменных в PHP? Что такое глобальные и локальные переменные?</h2>
    <p>
        Область видимости переменной определяет, где переменная может быть использована. Локальные переменные объявляются внутри функции и доступны только внутри этой функции. Глобальные переменные объявляются вне функций и доступны в любом месте скрипта, но для доступа к ним внутри функции нужно использовать ключевое слово <code>global</code>.
    </p>

    <h2>7. Что такое анонимная функция в PHP и в каких случаях она может быть полезна?</h2>
    <p>
        Анонимная функция (или замыкание) — это функция, которая не имеет имени. Она может быть присвоена переменной или передана как аргумент другой функции. Например:
        <pre><code>$greet = function($name) {
    return "Hello, $name!";
};
echo $greet("John");</code></pre>
        Анонимные функции полезны для создания callback-функций или для использования в функциях высшего порядка, таких как <code>array_map</code> или <code>array_filter</code>.
    </p>

    <h2>8. Объясните концепцию ООП в PHP. Что такое класс, объект, свойство и метод?</h2>
    <p>
        ООП (Объектно-Ориентированное Программирование) — это парадигма программирования, основанная на концепции объектов. В PHP:
        <ul>
            <li><strong>Класс</strong> — это шаблон для создания объектов, который определяет свойства и методы.</li>
            <li><strong>Объект</strong> — это экземпляр класса.</li>
            <li><strong>Свойство</strong> — это переменная, принадлежащая объекту.</li>
            <li><strong>Метод</strong> — это функция, принадлежащая объекту.</li>
        </ul>
        Пример:
        <pre><code>class Car {
    public $color;
    public function start() {
        echo "Car started!";
    }
}
$myCar = new Car();
$myCar->color = "red";
$myCar->start();</code></pre>
    </p>

    <h2>9. Что такое наследование и полиморфизм в ООП? Приведите пример их использования в PHP.</h2>
    <p>
        <strong>Наследование</strong> позволяет одному классу наследовать свойства и методы другого класса. Например:
        <pre><code>class Animal {
    public function speak() {
        echo "Animal sound!";
    }
}
class Dog extends Animal {
    public function speak() {
        echo "Woof!";
    }
}
$dog = new Dog();
$dog->speak(); // Выведет: Woof!</code></pre>
        <strong>Полиморфизм</strong> позволяет объектам разных классов использовать методы с одинаковыми именами, но разной реализацией. Например, метод <code>speak</code> в классе <code>Dog</code> переопределяет метод <code>speak</code> из класса <code>Animal</code>.
    </p>

    <h2>10. Каковы особенности работы с файлами в PHP? Перечислите основные функции для работы с файлами.</h2>
    <p>
        В PHP работа с файлами осуществляется с помощью следующих функций:
        <ul>
            <li><code>fopen()</code> — открывает файл.</li>
            <li><code>fclose()</code> — закрывает файл.</li>
            <li><code>fread()</code> — читает данные из файла.</li>
            <li><code>fwrite()</code> — записывает данные в файл.</li>
            <li><code>file_get_contents()</code> — читает весь файл в строку.</li>
            <li><code>file_put_contents()</code> — записывает данные в файл.</li>
            <li><code>file_exists()</code> — проверяет существование файла.</li>
            <li><code>unlink()</code> — удаляет файл.</li>
        </ul>
        Пример:
        <pre><code>$file = fopen("example.txt", "r");
$content = fread($file, filesize("example.txt"));
fclose($file);
echo $content;</code></pre>
    </p>

</body>
</html> 