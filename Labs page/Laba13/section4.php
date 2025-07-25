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
    <h1>Лабораторная работа №14 - Группировка и структурирование данных</h1>

    <!-- Задание 16 -->
    <div class="task">
        <h3>16. Группировка полей ввода с использованием &lt;fieldset&gt; и &lt;legend&gt;</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <fieldset>
                                <legend>Основные данные</legend>
                                <div class="form-group">
                                    <label for="name">Имя:</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Возраст:</label>
                                    <input type="number" id="age" name="age" required>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Дополнительные данные</legend>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон:</label>
                                    <input type="text" id="phone" name="phone" required>
                                </div>
                            </fieldset>
                            <button type="submit" name="task16">Отправить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task16'])) {
                            $name = $_POST['name'];
                            $age = $_POST['age'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            echo "Имя: $name<br>Возраст: $age<br>Email: $email<br>Телефон: $phone";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
&lt;form method="POST" action=""&gt;
    &lt;fieldset&gt;
        &lt;legend&gt;Основные данные&lt;/legend&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="name"&gt;Имя:&lt;/label&gt;
            &lt;input type="text" id="name" name="name" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="age"&gt;Возраст:&lt;/label&gt;
            &lt;input type="number" id="age" name="age" required&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
    &lt;fieldset&gt;
        &lt;legend&gt;Дополнительные данные&lt;/legend&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="email"&gt;Email:&lt;/label&gt;
            &lt;input type="text" id="email" name="email" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="phone"&gt;Телефон:&lt;/label&gt;
            &lt;input type="text" id="phone" name="phone" required&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
    &lt;button type="submit" name="task16"&gt;Отправить&lt;/button&gt;
&lt;/form&gt;
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 17 -->
    <div class="task">
        <h3>17. Табличный ввод нескольких пар чисел и вычисление суммы</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <table>
                                <tr>
                                    <th>Число 1</th>
                                    <th>Число 2</th>
                                </tr>
                                <tr>
                                    <td><input type="number" name="num17_1" required></td>
                                    <td><input type="number" name="num17_2" required></td>
                                </tr>
                                <tr>
                                    <td><input type="number" name="num17_3" required></td>
                                    <td><input type="number" name="num17_4" required></td>
                                </tr>
                            </table>
                            <button type="submit" name="task17">Вычислить суммы</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task17'])) {
                            $sum1 = $_POST['num17_1'] + $_POST['num17_2'];
                            $sum2 = $_POST['num17_3'] + $_POST['num17_4'];
                            echo "Сумма первой пары: $sum1<br>Сумма второй пары: $sum2";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
&lt;form method="POST" action=""&gt;
    &lt;table&gt;
        &lt;tr&gt;
            &lt;th&gt;Число 1&lt;/th&gt;
            &lt;th&gt;Число 2&lt;/th&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;&lt;input type="number" name="num17_1" required&gt;&lt;/td&gt;
            &lt;td&gt;&lt;input type="number" name="num17_2" required&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;&lt;input type="number" name="num17_3" required&gt;&lt;/td&gt;
            &lt;td&gt;&lt;input type="number" name="num17_4" required&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/table&gt;
    &lt;button type="submit" name="task17"&gt;Вычислить суммы&lt;/button&gt;
&lt;/form&gt;
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 18 -->
    <div class="task">
        <h3>18. Вложенные &lt;fieldset&gt; для подгрупп операций</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <fieldset>
                                <legend>Основная операция</legend>
                                <div class="form-group">
                                    <label for="num18_1">Число 1:</label>
                                    <input type="number" id="num18_1" name="num18_1" required>
                                </div>
                                <div class="form-group">
                                    <label for="num18_2">Число 2:</label>
                                    <input type="number" id="num18_2" name="num18_2" required>
                                </div>
                                <fieldset>
                                    <legend>Дополнительная операция</legend>
                                    <div class="form-group">
                                        <label for="num18_3">Число 3:</label>
                                        <input type="number" id="num18_3" name="num18_3" required>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <button type="submit" name="task18">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task18'])) {
                            $sum = $_POST['num18_1'] + $_POST['num18_2'] + $_POST['num18_3'];
                            echo "Сумма: $sum";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
&lt;form method="POST" action=""&gt;
    &lt;fieldset&gt;
        &lt;legend&gt;Основная операция&lt;/legend&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num18_1"&gt;Число 1:&lt;/label&gt;
            &lt;input type="number" id="num18_1" name="num18_1" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num18_2"&gt;Число 2:&lt;/label&gt;
            &lt;input type="number" id="num18_2" name="num18_2" required&gt;
        &lt;/div&gt;
        &lt;fieldset&gt;
            &lt;legend&gt;Дополнительная операция&lt;/legend&gt;
            &lt;div class="form-group"&gt;
                &lt;label for="num18_3"&gt;Число 3:&lt;/label&gt;
                &lt;input type="number" id="num18_3" name="num18_3" required&gt;
            &lt;/div&gt;
        &lt;/fieldset&gt;
    &lt;/fieldset&gt;
    &lt;button type="submit" name="task18"&gt;Вычислить&lt;/button&gt;
&lt;/form&gt;
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 19 -->
    <div class="task">
        <h3>19. Выбор основной и дополнительной операции</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <fieldset>
                                <legend>Основная операция</legend>
                                <div class="form-group">
                                    <label for="num19_1">Число 1:</label>
                                    <input type="number" id="num19_1" name="num19_1" required>
                                </div>
                                <div class="form-group">
                                    <label for="num19_2">Число 2:</label>
                                    <input type="number" id="num19_2" name="num19_2" required>
                                </div>
                                <div class="form-group">
                                    <label for="operation19">Операция:</label>
                                    <select id="operation19" name="operation19" required>
                                        <option value="add">Сложение</option>
                                        <option value="subtract">Вычитание</option>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Дополнительная операция</legend>
                                <div class="form-group">
                                    <label for="num19_3">Число 3:</label>
                                    <input type="number" id="num19_3" name="num19_3" required>
                                </div>
                                <div class="form-group">
                                    <label for="operation19_2">Операция:</label>
                                    <select id="operation19_2" name="operation19_2" required>
                                        <option value="multiply">Умножение</option>
                                        <option value="divide">Деление</option>
                                    </select>
                                </div>
                            </fieldset>
                            <button type="submit" name="task19">Вычислить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task19'])) {
                            $num19_1 = $_POST['num19_1'];
                            $num19_2 = $_POST['num19_2'];
                            $operation19 = $_POST['operation19'];
                            $num19_3 = $_POST['num19_3'];
                            $operation19_2 = $_POST['operation19_2'];

                            if ($operation19 == "add") {
                                $result = $num19_1 + $num19_2;
                            } else {
                                $result = $num19_1 - $num19_2;
                            }

                            if ($operation19_2 == "multiply") {
                                $result *= $num19_3;
                            } else {
                                $result /= $num19_3;
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
&lt;form method="POST" action=""&gt;
    &lt;fieldset&gt;
        &lt;legend&gt;Основная операция&lt;/legend&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num19_1"&gt;Число 1:&lt;/label&gt;
            &lt;input type="number" id="num19_1" name="num19_1" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num19_2"&gt;Число 2:&lt;/label&gt;
            &lt;input type="number" id="num19_2" name="num19_2" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="operation19"&gt;Операция:&lt;/label&gt;
            &lt;select id="operation19" name="operation19" required&gt;
                &lt;option value="add"&gt;Сложение&lt;/option&gt;
                &lt;option value="subtract"&gt;Вычитание&lt;/option&gt;
            &lt;/select&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
    &lt;fieldset&gt;
        &lt;legend&gt;Дополнительная операция&lt;/legend&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num19_3"&gt;Число 3:&lt;/label&gt;
            &lt;input type="number" id="num19_3" name="num19_3" required&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="operation19_2"&gt;Операция:&lt;/label&gt;
            &lt;select id="operation19_2" name="operation19_2" required&gt;
                &lt;option value="multiply"&gt;Умножение&lt;/option&gt;
                &lt;option value="divide"&gt;Деление&lt;/option&gt;
            &lt;/select&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
    &lt;button type="submit" name="task19"&gt;Вычислить&lt;/button&gt;
&lt;/form&gt;
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 20 -->
    <div class="task">
        <h3>20. Динамическое добавление полей для ввода чисел</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="" id="dynamicForm">
                            <div id="inputFields">
                                <div class="form-group">
                                    <label for="num20_1">Число 1:</label>
                                    <input type="number" name="num20[]" required>
                                </div>
                            </div>
                            <button type="button" onclick="addInputField()">Добавить поле</button>
                            <button type="submit" name="task20">Вычислить сумму</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task20'])) {
                            $numbers = $_POST['num20'];
                            $sum = array_sum($numbers);
                            echo "Сумма: $sum";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
&lt;form method="POST" action="" id="dynamicForm"&gt;
    &lt;div id="inputFields"&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="num20_1"&gt;Число 1:&lt;/label&gt;
            &lt;input type="number" name="num20[]" required&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;button type="button" onclick="addInputField()"&gt;Добавить поле&lt;/button&gt;
    &lt;button type="submit" name="task20"&gt;Вычислить сумму&lt;/button&gt;
&lt;/form&gt;

&lt;script&gt;
    function addInputField() {
        const inputFields = document.getElementById('inputFields');
        const newField = document.createElement('div');
        newField.classList.add('form-group');
        newField.innerHTML = `
            &lt;label&gt;Число ${inputFields.children.length + 1}:&lt;/label&gt;
            &lt;input type="number" name="num20[]" required&gt;
        `;
        inputFields.appendChild(newField);
    }
&lt;/script&gt;
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>
        function addInputField() {
            const inputFields = document.getElementById('inputFields');
            const newField = document.createElement('div');
            newField.classList.add('form-group');
            newField.innerHTML = `
                <label>Число ${inputFields.children.length + 1}:</label>
                <input type="number" name="num20[]" required>
            `;
            inputFields.appendChild(newField);
        }
    </script>
</body>
</html>