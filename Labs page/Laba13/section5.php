<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №14 - Визуализация и интерактивность</title>
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
    <h1>Лабораторная работа №14 - Визуализация и интерактивность</h1>

    <!-- Задание 21 -->
    <div class="task">
        <h3>21. Визуализация отношения двух чисел с помощью &lt;meter&gt;</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num21">Число 1:</label>
                                <input type="number" id="num21" name="num21" required>
                            </div>
                            <div class="form-group">
                                <label for="num22">Число 2:</label>
                                <input type="number" id="num22" name="num22" required>
                            </div>
                            <button type="submit" name="task21">Показать отношение</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task21'])) {
                            $num21 = $_POST['num21'];
                            $num22 = $_POST['num22'];
                            $ratio = $num21 / $num22;
                            echo "<meter value='$ratio' min='0' max='1'></meter>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task21'])) {
    $num21 = $_POST['num21'];
    $num22 = $_POST['num22'];
    $ratio = $num21 / $num22;
    echo "&lt;meter value='$ratio' min='0' max='1'&gt;&lt;/meter&gt;";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 22 -->
    <div class="task">
        <h3>22. Графическое отображение чисел с помощью &lt;canvas&gt;</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num23">Число 1:</label>
                                <input type="number" id="num23" name="num23" required>
                            </div>
                            <div class="form-group">
                                <label for="num24">Число 2:</label>
                                <input type="number" id="num24" name="num24" required>
                            </div>
                            <button type="submit" name="task22">Нарисовать график</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task22'])) {
                            $num23 = $_POST['num23'];
                            $num24 = $_POST['num24'];
                            echo "<canvas id='myCanvas' width='200' height='100'></canvas>";
                            echo "<script>
                                const canvas = document.getElementById('myCanvas');
                                const ctx = canvas.getContext('2d');
                                ctx.fillStyle = 'blue';
                                ctx.fillRect(10, 10, $num23, 30);
                                ctx.fillStyle = 'red';
                                ctx.fillRect(10, 50, $num24, 30);
                            </script>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task22'])) {
    $num23 = $_POST['num23'];
    $num24 = $_POST['num24'];
    echo "&lt;canvas id='myCanvas' width='200' height='100'&gt;&lt;/canvas&gt;";
    echo "&lt;script&gt;
        const canvas = document.getElementById('myCanvas');
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = 'blue';
        ctx.fillRect(10, 10, $num23, 30);
        ctx.fillStyle = 'red';
        ctx.fillRect(10, 50, $num24, 30);
    &lt;/script&gt;";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 23 -->
    <div class="task">
        <h3>23. Визуализация результатов вычислений с помощью &lt;progress&gt;</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="num25">Число 1:</label>
                                <input type="number" id="num25" name="num25" required>
                            </div>
                            <div class="form-group">
                                <label for="num26">Число 2:</label>
                                <input type="number" id="num26" name="num26" required>
                            </div>
                            <button type="submit" name="task23">Показать прогресс</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display">
                        <?php
                        if (isset($_POST['task23'])) {
                            $num25 = $_POST['num25'];
                            $num26 = $_POST['num26'];
                            $sum = $num25 + $num26;
                            echo "<progress value='$sum' max='100'></progress>";
                        }
                        ?>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
if (isset($_POST['task23'])) {
    $num25 = $_POST['num25'];
    $num26 = $_POST['num26'];
    $sum = $num25 + $num26;
    echo "&lt;progress value='$sum' max='100'&gt;&lt;/progress&gt;";
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 24 -->
    <div class="task">
        <h3>24. Обработка формы с помощью AJAX</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form id="ajaxForm">
                            <div class="form-group">
                                <label for="num27">Число 1:</label>
                                <input type="number" id="num27" name="num27" required>
                            </div>
                            <div class="form-group">
                                <label for="num28">Число 2:</label>
                                <input type="number" id="num28" name="num28" required>
                            </div>
                            <button type="submit" name="task24">Отправить</button>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display" id="ajaxResult"></div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
document.getElementById('ajaxForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('ajax_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('ajaxResult').innerHTML = data;
    });
});
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Задание 25 -->
    <div class="task">
        <h3>25. Динамическое обновление результата</h3>
        <table>
            <tr>
                <td class="column">
                    <div class="column-title">Ввод данных</div>
                    <div class="active-form">
                        <form>
                            <div class="form-group">
                                <label for="num29">Число 1:</label>
                                <input type="number" id="num29" name="num29" oninput="updateSum()" required>
                            </div>
                            <div class="form-group">
                                <label for="num30">Число 2:</label>
                                <input type="number" id="num30" name="num30" oninput="updateSum()" required>
                            </div>
                        </form>
                    </div>
                </td>
                <td class="column">
                    <div class="column-title">Результат</div>
                    <div class="result-display" id="dynamicResult"></div>
                </td>
                <td class="column">
                    <div class="column-title">Код</div>
                    <div class="code-block">
                        <pre>
function updateSum() {
    const num29 = document.getElementById('num29').value;
    const num30 = document.getElementById('num30').value;
    const sum = parseInt(num29) + parseInt(num30);
    document.getElementById('dynamicResult').innerHTML = "Сумма: " + sum;
}
                        </pre>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>
        // Функция для обновления суммы в реальном времени
        function updateSum() {
            const num29 = document.getElementById('num29').value;
            const num30 = document.getElementById('num30').value;
            const sum = parseInt(num29) + parseInt(num30);
            document.getElementById('dynamicResult').innerHTML = "Сумма: " + sum;
        }

        // Обработка AJAX формы
        document.getElementById('ajaxForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('ajax_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('ajaxResult').innerHTML = data;
            });
        });
    </script>
</body>
</html>