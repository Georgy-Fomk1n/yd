<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №14 - Раздел VI</title>
    <style>
        /* Стили из предыдущего примера */
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
    <h1>Лабораторная работа №14 - Раздел VI: Многошаговые формы и сложные процессы</h1>

    <!-- Задание 26 -->
    <div class="task">
        <h3>26. Многошаговая форма для ввода чисел и выбора операции</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num26_1">Число 1:</label>
                                <input type="number" id="num26_1" name="num26_1" required>
                            </div>
                            <div class="form-group">
                                <label for="num26_2">Число 2:</label>
                                <input type="number" id="num26_2" name="num26_2" required>
                            </div>
                            <div class="form-group">
                                <label for="operation26">Операция:</label>
                                <select id="operation26" name="operation26" required>
                                    <option value="add">Сложение</option>
                                    <option value="subtract">Вычитание</option>
                                    <option value="multiply">Умножение</option>
                                    <option value="divide">Деление</option>
                                </select>
                            </div>
                            <button type="submit" name="task26">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task26'])) {
                            $num26_1 = $_POST['num26_1'];
                            $num26_2 = $_POST['num26_2'];
                            $operation26 = $_POST['operation26'];
                            $result = 0;

                            switch ($operation26) {
                                case 'add':
                                    $result = $num26_1 + $num26_2;
                                    break;
                                case 'subtract':
                                    $result = $num26_1 - $num26_2;
                                    break;
                                case 'multiply':
                                    $result = $num26_1 * $num26_2;
                                    break;
                                case 'divide':
                                    $result = $num26_2 != 0 ? $num26_1 / $num26_2 : "Ошибка: деление на ноль";
                                    break;
                            }

                            echo "Результат: $result";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task26'])) {
    $num26_1 = $_POST['num26_1'];
    $num26_2 = $_POST['num26_2'];
    $operation26 = $_POST['operation26'];
    $result = 0;

    switch ($operation26) {
        case 'add':
            $result = $num26_1 + $num26_2;
            break;
        case 'subtract':
            $result = $num26_1 - $num26_2;
            break;
        case 'multiply':
            $result = $num26_1 * $num26_2;
            break;
        case 'divide':
            $result = $num26_2 != 0 ? $num26_1 / $num26_2 : "Ошибка: деление на ноль";
            break;
    }

    echo "Результат: $result";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 27 -->
    <div class="task">
        <h3>27. Форма с сохранением промежуточных результатов</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num27_1">Число 1:</label>
                                <input type="number" id="num27_1" name="num27_1" required>
                            </div>
                            <div class="form-group">
                                <label for="num27_2">Число 2:</label>
                                <input type="number" id="num27_2" name="num27_2" required>
                            </div>
                            <button type="submit" name="task27_step1">Сохранить числа</button>
                        </form>
                        <?php
                        session_start();
                        if (isset($_POST['task27_step1'])) {
                            $_SESSION['num27_1'] = $_POST['num27_1'];
                            $_SESSION['num27_2'] = $_POST['num27_2'];
                            echo "<p>Числа сохранены.</p>";
                        }
                        ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="operation27">Операция:</label>
                                <select id="operation27" name="operation27" required>
                                    <option value="add">Сложение</option>
                                    <option value="subtract">Вычитание</option>
                                    <option value="multiply">Умножение</option>
                                    <option value="divide">Деление</option>
                                </select>
                            </div>
                            <button type="submit" name="task27_step2">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task27_step2'])) {
                            $num27_1 = $_SESSION['num27_1'];
                            $num27_2 = $_SESSION['num27_2'];
                            $operation27 = $_POST['operation27'];
                            $result = 0;

                            switch ($operation27) {
                                case 'add':
                                    $result = $num27_1 + $num27_2;
                                    break;
                                case 'subtract':
                                    $result = $num27_1 - $num27_2;
                                    break;
                                case 'multiply':
                                    $result = $num27_1 * $num27_2;
                                    break;
                                case 'divide':
                                    $result = $num27_2 != 0 ? $num27_1 / $num27_2 : "Ошибка: деление на ноль";
                                    break;
                            }

                            echo "Результат: $result";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
session_start();
if (isset($_POST['task27_step1'])) {
    $_SESSION['num27_1'] = $_POST['num27_1'];
    $_SESSION['num27_2'] = $_POST['num27_2'];
    echo "&lt;p&gt;Числа сохранены.&lt;/p&gt;";
}

if (isset($_POST['task27_step2'])) {
    $num27_1 = $_SESSION['num27_1'];
    $num27_2 = $_SESSION['num27_2'];
    $operation27 = $_POST['operation27'];
    $result = 0;

    switch ($operation27) {
        case 'add':
            $result = $num27_1 + $num27_2;
            break;
        case 'subtract':
            $result = $num27_1 - $num27_2;
            break;
        case 'multiply':
            $result = $num27_1 * $num27_2;
            break;
        case 'divide':
            $result = $num27_2 != 0 ? $num27_1 / $num27_2 : "Ошибка: деление на ноль";
            break;
    }

    echo "Результат: $result";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 28 -->
    <div class="task">
        <h3>28. Форма для вычисления дней между двумя датами</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="date28_1">Дата 1:</label>
                                <input type="date" id="date28_1" name="date28_1" required>
                            </div>
                            <div class="form-group">
                                <label for="date28_2">Дата 2:</label>
                                <input type="date" id="date28_2" name="date28_2" required>
                            </div>
                            <button type="submit" name="task28">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task28'])) {
                            $date28_1 = new DateTime($_POST['date28_1']);
                            $date28_2 = new DateTime($_POST['date28_2']);
                            $interval = $date28_1->diff($date28_2);
                            echo "Дней между датами: " . $interval->days;
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task28'])) {
    $date28_1 = new DateTime($_POST['date28_1']);
    $date28_2 = new DateTime($_POST['date28_2']);
    $interval = $date28_1->diff($date28_2);
    echo "Дней между датами: " . $interval->days;
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 29 -->
    <div class="task">
        <h3>29. Форма с зависимыми полями ввода</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="choice29">Выберите опцию:</label>
                                <select id="choice29" name="choice29" required onchange="updateFields()">
                                    <option value="text">Текстовое поле</option>
                                    <option value="number">Числовое поле</option>
                                    <option value="date">Поле даты</option>
                                </select>
                            </div>
                            <div class="form-group" id="dynamicField">
                                <!-- Динамическое поле будет здесь -->
                            </div>
                            <button type="submit" name="task29">Отправить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task29'])) {
                            $choice29 = $_POST['choice29'];
                            $value = $_POST['dynamic_value'];
                            echo "Вы выбрали: $choice29, значение: $value";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task29'])) {
    $choice29 = $_POST['choice29'];
    $value = $_POST['dynamic_value'];
    echo "Вы выбрали: $choice29, значение: $value";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 30 -->
    <div class="task">
        <h3>30. Форма-калькулятор с историей операций</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num30_1">Число 1:</label>
                                <input type="number" id="num30_1" name="num30_1" required>
                            </div>
                            <div class="form-group">
                                <label for="num30_2">Число 2:</label>
                                <input type="number" id="num30_2" name="num30_2" required>
                            </div>
                            <div class="form-group">
                                <label for="operation30">Операция:</label>
                                <select id="operation30" name="operation30" required>
                                    <option value="add">Сложение</option>
                                    <option value="subtract">Вычитание</option>
                                    <option value="multiply">Умножение</option>
                                    <option value="divide">Деление</option>
                                </select>
                            </div>
                            <button type="submit" name="task30">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        session_start();
                        if (!isset($_SESSION['history'])) {
                            $_SESSION['history'] = [];
                        }

                        if (isset($_POST['task30'])) {
                            $num30_1 = $_POST['num30_1'];
                            $num30_2 = $_POST['num30_2'];
                            $operation30 = $_POST['operation30'];
                            $result = 0;

                            switch ($operation30) {
                                case 'add':
                                    $result = $num30_1 + $num30_2;
                                    break;
                                case 'subtract':
                                    $result = $num30_1 - $num30_2;
                                    break;
                                case 'multiply':
                                    $result = $num30_1 * $num30_2;
                                    break;
                                case 'divide':
                                    $result = $num30_2 != 0 ? $num30_1 / $num30_2 : "Ошибка: деление на ноль";
                                    break;
                            }

                            $operationString = "$num30_1 $operation30 $num30_2 = $result";
                            array_push($_SESSION['history'], $operationString);

                            echo "Результат: $result<br><br>";
                            echo "История операций:<br>";
                            foreach ($_SESSION['history'] as $operation) {
                                echo "$operation<br>";
                            }
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

if (isset($_POST['task30'])) {
    $num30_1 = $_POST['num30_1'];
    $num30_2 = $_POST['num30_2'];
    $operation30 = $_POST['operation30'];
    $result = 0;

    switch ($operation30) {
        case 'add':
            $result = $num30_1 + $num30_2;
            break;
        case 'subtract':
            $result = $num30_1 - $num30_2;
            break;
        case 'multiply':
            $result = $num30_1 * $num30_2;
            break;
        case 'divide':
            $result = $num30_2 != 0 ? $num30_1 / $num30_2 : "Ошибка: деление на ноль";
            break;
    }

    $operationString = "$num30_1 $operation30 $num30_2 = $result";
    array_push($_SESSION['history'], $operationString);

    echo "Результат: $result&lt;br&gt;&lt;br&gt;";
    echo "История операций:&lt;br&gt;";
    foreach ($_SESSION['history'] as $operation) {
        echo "$operation&lt;br&gt;";
    }
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- JavaScript для обновления динамических полей -->
    <script>
        function updateFields() {
            const choice = document.getElementById('choice29').value;
            const dynamicField = document.getElementById('dynamicField');
            let html = '';

            if (choice === 'text') {
                html = '<label for="dynamic_value">Введите текст:</label><input type="text" id="dynamic_value" name="dynamic_value" required>';
            } else if (choice === 'number') {
                html = '<label for="dynamic_value">Введите число:</label><input type="number" id="dynamic_value" name="dynamic_value" required>';
            } else if (choice === 'date') {
                html = '<label for="dynamic_value">Введите дату:</label><input type="date" id="dynamic_value" name="dynamic_value" required>';
            }

            dynamicField.innerHTML = html;
        }

        // Инициализация при загрузке страницы
        document.addEventListener('DOMContentLoaded', function () {
            updateFields();
        });
    </script>
</body>
</html>