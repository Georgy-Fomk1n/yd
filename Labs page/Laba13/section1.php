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
    </style>
</head>
<body>
    <h1>Лабораторная работа №13 - PHP Практические задания</h1>

    <!-- Задание 1 -->
    <div class="task">
        <h3>1. Сумма двух чисел</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num1">Число 1:</label>
                                <input type="number" id="num1" name="num1" required>
                            </div>
                            <div class="form-group">
                                <label for="num2">Число 2:</label>
                                <input type="number" id="num2" name="num2" required>
                            </div>
                            <button type="submit" name="task1">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task1'])) {
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            $sum = $num1 + $num2;
                            echo "Сумма: $sum";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task1'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $sum = $num1 + $num2;
    echo "Сумма: $sum";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 2 -->
    <div class="task">
        <h3>2. Выбор операции</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num3">Число 1:</label>
                                <input type="number" id="num3" name="num3" required>
                            </div>
                            <div class="form-group">
                                <label for="num4">Число 2:</label>
                                <input type="number" id="num4" name="num4" required>
                            </div>
                            <div class="form-group">
                                <label for="operation">Операция:</label>
                                <select id="operation" name="operation" required>
                                    <option value="add">Сложение</option>
                                    <option value="subtract">Вычитание</option>
                                    <option value="multiply">Умножение</option>
                                    <option value="divide">Деление</option>
                                </select>
                            </div>
                            <button type="submit" name="task2">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task2'])) {
                            $num3 = $_POST['num3'];
                            $num4 = $_POST['num4'];
                            $operation = $_POST['operation'];

                            switch ($operation) {
                                case 'add':
                                    $result = $num3 + $num4;
                                    echo "Результат: $result";
                                    break;
                                case 'subtract':
                                    $result = $num3 - $num4;
                                    echo "Результат: $result";
                                    break;
                                case 'multiply':
                                    $result = $num3 * $num4;
                                    echo "Результат: $result";
                                    break;
                                case 'divide':
                                    if ($num4 != 0) {
                                        $result = $num3 / $num4;
                                        echo "Результат: $result";
                                    } else {
                                        echo "<div class='error'>Ошибка: деление на ноль!</div>";
                                    }
                                    break;
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task2'])) {
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'add':
            $result = $num3 + $num4;
            echo "Результат: $result";
            break;
        case 'subtract':
            $result = $num3 - $num4;
            echo "Результат: $result";
            break;
        case 'multiply':
            $result = $num3 * $num4;
            echo "Результат: $result";
            break;
        case 'divide':
            if ($num4 != 0) {
                $result = $num3 / $num4;
                echo "Результат: $result";
            } else {
                echo "&lt;div class='error'&gt;Ошибка: деление на ноль!&lt;/div&gt;";
            }
            break;
    }
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 3 -->
    <div class="task">
        <h3>3. Обработка деления на ноль</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num5">Число 1:</label>
                                <input type="number" id="num5" name="num5" required>
                            </div>
                            <div class="form-group">
                                <label for="num6">Число 2:</label>
                                <input type="number" id="num6" name="num6" required>
                            </div>
                            <button type="submit" name="task3">Разделить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task3'])) {
                            $num5 = $_POST['num5'];
                            $num6 = $_POST['num6'];

                            if ($num6 != 0) {
                                $result = $num5 / $num6;
                                echo "Результат: $result";
                            } else {
                                echo "<div class='error'>Ошибка: деление на ноль!</div>";
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task3'])) {
    $num5 = $_POST['num5'];
    $num6 = $_POST['num6'];

    if ($num6 != 0) {
        $result = $num5 / $num6;
        echo "Результат: $result";
    } else {
        echo "&lt;div class='error'&gt;Ошибка: деление на ноль!&lt;/div&gt;";
    }
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 4 -->
    <div class="task">
        <h3>4. Выбор операции с радиокнопками</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num7">Число 1:</label>
                                <input type="number" id="num7" name="num7" required>
                            </div>
                            <div class="form-group">
                                <label for="num8">Число 2:</label>
                                <input type="number" id="num8" name="num8" required>
                            </div>
                            <div class="form-group">
                                <label>Операция:</label><br>
                                <input type="radio" id="add" name="operation2" value="add" required>
                                <label for="add">Сложение</label><br>
                                <input type="radio" id="subtract" name="operation2" value="subtract">
                                <label for="subtract">Вычитание</label><br>
                                <input type="radio" id="multiply" name="operation2" value="multiply">
                                <label for="multiply">Умножение</label><br>
                                <input type="radio" id="divide" name="operation2" value="divide">
                                <label for="divide">Деление</label>
                            </div>
                            <button type="submit" name="task4">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task4'])) {
                            $num7 = $_POST['num7'];
                            $num8 = $_POST['num8'];
                            $operation2 = $_POST['operation2'];

                            switch ($operation2) {
                                case 'add':
                                    $result = $num7 + $num8;
                                    echo "Результат: $result";
                                    break;
                                case 'subtract':
                                    $result = $num7 - $num8;
                                    echo "Результат: $result";
                                    break;
                                case 'multiply':
                                    $result = $num7 * $num8;
                                    echo "Результат: $result";
                                    break;
                                case 'divide':
                                    if ($num8 != 0) {
                                        $result = $num7 / $num8;
                                        echo "Результат: $result";
                                    } else {
                                        echo "<div class='error'>Ошибка: деление на ноль!</div>";
                                    }
                                    break;
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task4'])) {
    $num7 = $_POST['num7'];
    $num8 = $_POST['num8'];
    $operation2 = $_POST['operation2'];

    switch ($operation2) {
        case 'add':
            $result = $num7 + $num8;
            echo "Результат: $result";
            break;
        case 'subtract':
            $result = $num7 - $num8;
            echo "Результат: $result";
            break;
        case 'multiply':
            $result = $num7 * $num8;
            echo "Результат: $result";
            break;
        case 'divide':
            if ($num8 != 0) {
                $result = $num7 / $num8;
                echo "Результат: $result";
            } else {
                echo "&lt;div class='error'&gt;Ошибка: деление на ноль!&lt;/div&gt;";
            }
            break;
    }
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 5 -->
    <div class="task">
        <h3>5. Выбор нескольких операций</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num9">Число 1:</label>
                                <input type="number" id="num9" name="num9" required>
                            </div>
                            <div class="form-group">
                                <label for="num10">Число 2:</label>
                                <input type="number" id="num10" name="num10" required>
                            </div>
                            <div class="form-group">
                                <label>Операции:</label><br>
                                <input type="checkbox" id="add2" name="operations[]" value="add">
                                <label for="add2">Сложение</label><br>
                                <input type="checkbox" id="subtract2" name="operations[]" value="subtract">
                                <label for="subtract2">Вычитание</label><br>
                                <input type="checkbox" id="multiply2" name="operations[]" value="multiply">
                                <label for="multiply2">Умножение</label><br>
                                <input type="checkbox" id="divide2" name="operations[]" value="divide">
                                <label for="divide2">Деление</label>
                            </div>
                            <button type="submit" name="task5">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task5'])) {
                            $num9 = $_POST['num9'];
                            $num10 = $_POST['num10'];
                            $operations = $_POST['operations'];

                            foreach ($operations as $operation) {
                                switch ($operation) {
                                    case 'add':
                                        $result = $num9 + $num10;
                                        echo "Сложение: $result<br>";
                                        break;
                                    case 'subtract':
                                        $result = $num9 - $num10;
                                        echo "Вычитание: $result<br>";
                                        break;
                                    case 'multiply':
                                        $result = $num9 * $num10;
                                        echo "Умножение: $result<br>";
                                        break;
                                    case 'divide':
                                        if ($num10 != 0) {
                                            $result = $num9 / $num10;
                                            echo "Деление: $result<br>";
                                        } else {
                                            echo "<div class='error'>Ошибка: деление на ноль!</div>";
                                        }
                                        break;
                                }
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task5'])) {
    $num9 = $_POST['num9'];
    $num10 = $_POST['num10'];
    $operations = $_POST['operations'];

    foreach ($operations as $operation) {
        switch ($operation) {
            case 'add':
                $result = $num9 + $num10;
                echo "Сложение: $result&lt;br&gt;";
                break;
            case 'subtract':
                $result = $num9 - $num10;
                echo "Вычитание: $result&lt;br&gt;";
                break;
            case 'multiply':
                $result = $num9 * $num10;
                echo "Умножение: $result&lt;br&gt;";
                break;
            case 'divide':
                if ($num10 != 0) {
                    $result = $num9 / $num10;
                    echo "Деление: $result&lt;br&gt;";
                } else {
                    echo "&lt;div class='error'&gt;Ошибка: деление на ноль!&lt;/div&gt;";
                }
                break;
        }
    }
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>