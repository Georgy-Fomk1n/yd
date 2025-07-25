<?php
session_start();

// Обработка данных формы
$results = []; // Массив для хранения результатов каждого задания
$errors = []; // Массив для хранения ошибок

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Общие данные для всех заданий
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;

    // Задание 1: Сумма двух чисел
    if (isset($_POST['task1'])) {
        $results['task1'] = $num1 + $num2;
    }

    // Задание 2: Выбор операции
    if (isset($_POST['task2'])) {
        $operation = $_POST['operation'] ?? 'add';
        switch ($operation) {
            case 'add':
                $results['task2'] = $num1 + $num2;
                break;
            case 'subtract':
                $results['task2'] = $num1 - $num2;
                break;
            case 'multiply':
                $results['task2'] = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $results['task2'] = $num1 / $num2;
                } else {
                    $errors['task2'] = 'Ошибка: деление на ноль!';
                }
                break;
        }
    }

    // Задание 4: Радиокнопки для выбора операции
    if (isset($_POST['task4'])) {
        $operation = $_POST['operation_radio'] ?? 'add';
        switch ($operation) {
            case 'add':
                $results['task4'] = $num1 + $num2;
                break;
            case 'subtract':
                $results['task4'] = $num1 - $num2;
                break;
            case 'multiply':
                $results['task4'] = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $results['task4'] = $num1 / $num2;
                } else {
                    $errors['task4'] = 'Ошибка: деление на ноль!';
                }
                break;
        }
    }

    // Задание 5: Чекбоксы для выбора нескольких операций
    if (isset($_POST['task5'])) {
        $operations = $_POST['operations'] ?? [];
        foreach ($operations as $op) {
            switch ($op) {
                case 'add':
                    $results['task5']['add'] = $num1 + $num2;
                    break;
                case 'subtract':
                    $results['task5']['subtract'] = $num1 - $num2;
                    break;
                case 'multiply':
                    $results['task5']['multiply'] = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $results['task5']['divide'] = $num1 / $num2;
                    } else {
                        $errors['task5'] = 'Ошибка: деление на ноль!';
                    }
                    break;
            }
        }
    }

    // Задание 6: Ползунки для сложения
    if (isset($_POST['task6'])) {
        $results['task6'] = $num1 + $num2;
    }

    // Задание 7: Шаговые числовые поля
    if (isset($_POST['task7'])) {
        $results['task7'] = $num1 + $num2;
    }

    // Задание 8: Скрытое поле для возведения в степень
    if (isset($_POST['task8'])) {
        $results['task8'] = pow($num1, $num2);
    }

    // Задание 9: Вычисление математического выражения
    if (isset($_POST['task9'])) {
        $expression = $_POST['expression'] ?? '';
        try {
            $results['task9'] = eval("return $expression;");
        } catch (Throwable $e) {
            $errors['task9'] = 'Ошибка: неверное выражение!';
        }
    }

    // Задание 10: Смешивание цветов
    if (isset($_POST['task10'])) {
        $color1 = $_POST['color1'] ?? '#000000';
        $color2 = $_POST['color2'] ?? '#000000';
        $results['task10'] = [
            'color1' => $color1,
            'color2' => $color2,
            'mixed' => mixColors($color1, $color2)
        ];
    }

    // Задание 11: Загрузка текстового файла с двумя числами
    if (isset($_POST['task11'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $numbers = array_map('intval', explode(' ', $fileContent));
            if (count($numbers) === 2) {
                $results['task11'] = [
                    'sum' => $numbers[0] + $numbers[1],
                    'difference' => $numbers[0] - $numbers[1],
                    'product' => $numbers[0] * $numbers[1],
                    'quotient' => $numbers[1] != 0 ? $numbers[0] / $numbers[1] : 'Ошибка: деление на ноль!'
                ];
            } else {
                $errors['task11'] = 'Ошибка: файл должен содержать ровно два числа!';
            }
        } else {
            $errors['task11'] = 'Ошибка: файл не загружен!';
        }
    }

    // Задание 12: Проверка корректности содержимого файла
    if (isset($_POST['task12'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $numbers = array_map('intval', explode(' ', $fileContent));
            if (count($numbers) === 2 && is_numeric($numbers[0]) && is_numeric($numbers[1])) {
                $results['task12'] = [
                    'sum' => $numbers[0] + $numbers[1],
                    'difference' => $numbers[0] - $numbers[1],
                    'product' => $numbers[0] * $numbers[1],
                    'quotient' => $numbers[1] != 0 ? $numbers[0] / $numbers[1] : 'Ошибка: деление на ноль!'
                ];
            } else {
                $errors['task12'] = 'Ошибка: файл должен содержать ровно два числа!';
            }
        } else {
            $errors['task12'] = 'Ошибка: файл не загружен!';
        }
    }

    // Задание 13: Загрузка файла с несколькими парами чисел
    if (isset($_POST['task13'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $lines = explode("\n", $fileContent);
            $results['task13'] = [];
            foreach ($lines as $line) {
                $numbers = array_map('intval', explode(' ', $line));
                if (count($numbers) === 2) {
                    $results['task13'][] = [
                        'numbers' => $numbers,
                        'sum' => $numbers[0] + $numbers[1]
                    ];
                }
            }
        } else {
            $errors['task13'] = 'Ошибка: файл не загружен!';
        }
    }

    // Задание 14: Загрузка файла с математическим выражением
    if (isset($_POST['task14'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $expression = file_get_contents($_FILES['file']['tmp_name']);
            try {
                $results['task14'] = eval("return $expression;");
            } catch (Throwable $e) {
                $errors['task14'] = 'Ошибка: неверное выражение!';
            }
        } else {
            $errors['task14'] = 'Ошибка: файл не загружен!';
        }
    }

    // Задание 15: Визуализация числовых данных из файла
    if (isset($_POST['task15'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $numbers = array_map('intval', explode(' ', $fileContent));
            $results['task15'] = $numbers;
        } else {
            $errors['task15'] = 'Ошибка: файл не загружен!';
        }
    }

    // Задание 16: Группировка полей ввода и операций
    if (isset($_POST['task16'])) {
        $operation = $_POST['operation'] ?? 'add';
        switch ($operation) {
            case 'add':
                $results['task16'] = $num1 + $num2;
                break;
            case 'subtract':
                $results['task16'] = $num1 - $num2;
                break;
            case 'multiply':
                $results['task16'] = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $results['task16'] = $num1 / $num2;
                } else {
                    $errors['task16'] = 'Ошибка: деление на ноль!';
                }
                break;
        }
    }

    // Задание 17: Табличный ввод нескольких пар чисел
    if (isset($_POST['task17'])) {
        $pairs = $_POST['pairs'] ?? [];
        $results['task17'] = [];
        foreach ($pairs as $pair) {
            $num1 = $pair['num1'] ?? 0;
            $num2 = $pair['num2'] ?? 0;
            $results['task17'][] = [
                'numbers' => [$num1, $num2],
                'sum' => $num1 + $num2
            ];
        }
    }

    // Задание 18: Подгруппы операций
    if (isset($_POST['task18'])) {
        $operation1 = $_POST['operation1'] ?? 'add';
        $operation2 = $_POST['operation2'] ?? 'add';
        $results['task18'] = [
            'operation1' => calculate($num1, $num2, $operation1),
            'operation2' => calculate($num1, $num2, $operation2)
        ];
    }

    // Задание 19: Основная и дополнительная операции
    if (isset($_POST['task19'])) {
        $mainOperation = $_POST['main_operation'] ?? 'add';
        $secondaryOperation = $_POST['secondary_operation'] ?? 'add';
        $results['task19'] = [
            'main' => calculate($num1, $num2, $mainOperation),
            'secondary' => calculate($num1, $num2, $secondaryOperation)
        ];
    }

    // Задание 20: Динамически добавляемые поля
    if (isset($_POST['task20'])) {
        $numbers = $_POST['numbers'] ?? [];
        $results['task20'] = array_sum($numbers);
    }

    // Задание 21: Визуализация отношения двух чисел
    if (isset($_POST['task21'])) {
        $results['task21'] = [
            'num1' => $num1,
            'num2' => $num2,
            'ratio' => $num2 != 0 ? $num1 / $num2 : 'Ошибка: деление на ноль!'
        ];
    }

    // Задание 22: Графическое отображение вводимых чисел
    if (isset($_POST['task22'])) {
        $numbers = $_POST['numbers'] ?? [];
        $results['task22'] = $numbers;
    }

    // Задание 23: Визуализация результатов вычислений
    if (isset($_POST['task23'])) {
        $results['task23'] = [
            'sum' => $num1 + $num2,
            'difference' => $num1 - $num2,
            'product' => $num1 * $num2,
            'quotient' => $num2 != 0 ? $num1 / $num2 : 'Ошибка: деление на ноль!'
        ];
    }

    // Задание 24: Обработка формы с помощью AJAX
    if (isset($_POST['task24'])) {
        $results['task24'] = $num1 + $num2;
    }

    // Задание 25: Динамическое обновление результата
    if (isset($_POST['task25'])) {
        $results['task25'] = $num1 + $num2;
    }

    // Задание 26: Многошаговая форма
    if (isset($_POST['task26'])) {
        $step = $_POST['step'] ?? 1;
        if ($step == 1) {
            $num1 = $_POST['num1'] ?? 0;
            $num2 = $_POST['num2'] ?? 0;
            $_SESSION['task26'] = ['num1' => $num1, 'num2' => $num2];
            $results['task26'] = ['step' => 2];
        } elseif ($step == 2) {
            $operation = $_POST['operation'] ?? 'add';
            $numbers = $_SESSION['task26'];
            $results['task26'] = calculate($numbers['num1'], $numbers['num2'], $operation);
        }
    }

    // Задание 27: Сохранение промежуточных результатов
    if (isset($_POST['task27'])) {
        $step = $_POST['step'] ?? 1;
        if ($step == 1) {
            $num1 = $_POST['num1'] ?? 0;
            $num2 = $_POST['num2'] ?? 0;
            $_SESSION['task27'] = ['num1' => $num1, 'num2' => $num2];
            $results['task27'] = ['step' => 2];
        } elseif ($step == 2) {
            $operation = $_POST['operation'] ?? 'add';
            $numbers = $_SESSION['task27'];
            $results['task27'] = calculate($numbers['num1'], $numbers['num2'], $operation);
        }
    }

    // Задание 28: Вычисление дней между двумя датами
    if (isset($_POST['task28'])) {
        $date1 = new DateTime($_POST['date1']);
        $date2 = new DateTime($_POST['date2']);
        $interval = $date1->diff($date2);
        $results['task28'] = $interval->days;
    }

    // Задание 29: Поля ввода, зависящие от выбора пользователя
    if (isset($_POST['task29'])) {
        $operation = $_POST['operation'] ?? 'add';
        $results['task29'] = calculate($num1, $num2, $operation);
    }

    // Задание 30: История операций
    if (isset($_POST['task30'])) {
        $operation = $_POST['operation'] ?? 'add';
        $result = calculate($num1, $num2, $operation);
        $_SESSION['history'] = $_SESSION['history'] ?? [];
        $_SESSION['history'][] = "$num1 $operation $num2 = $result";
        $results['task30'] = $_SESSION['history'];
    }
}

// Функция для смешивания цветов
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

// Функция для вычисления операции
function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            return $num2 != 0 ? $num1 / $num2 : 'Ошибка: деление на ноль!';
        default:
            return 0;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Математические операции</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1, h2, h3 {
            color: #444;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
            color: #155724;
        }
        .error {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8d7da;
            border-radius: 4px;
            color: #721c24;
        }
        .task-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .graph {
            display: flex;
            align-items: flex-end;
            height: 200px;
            margin-top: 20px;
        }
        .graph-bar {
            flex: 1;
            background-color: #28a745;
            margin: 0 2px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Математические операции</h1>

    <!-- Раздел I: Базовые формы и операции -->
    <section>
        <h2>Раздел I: Базовые формы и операции</h2>

        <!-- Задание 1: Сумма двух чисел -->
        <div class="task-section">
            <h3>Задание 1: Сумма двух чисел</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <button type="submit" name="task1">Вычислить сумму</button>
            </form>
            <?php if (isset($results['task1'])): ?>
                <div class="result">Результат: <?= $results['task1'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 2: Выбор операции -->
        <div class="task-section">
            <h3>Задание 2: Выбор операции</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <div class="form-group">
                    <label for="operation">Операция:</label>
                    <select name="operation" id="operation">
                        <option value="add">Сложение</option>
                        <option value="subtract">Вычитание</option>
                        <option value="multiply">Умножение</option>
                        <option value="divide">Деление</option>
                    </select>
                </div>
                <button type="submit" name="task2">Вычислить</button>
            </form>
            <?php if (isset($results['task2'])): ?>
                <div class="result">Результат: <?= $results['task2'] ?></div>
            <?php elseif (isset($errors['task2'])): ?>
                <div class="error"><?= $errors['task2'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 4: Радиокнопки для выбора операции -->
        <div class="task-section">
            <h3>Задание 4: Радиокнопки для выбора операции</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <div class="form-group">
                    <label><input type="radio" name="operation_radio" value="add" checked> Сложение</label>
                    <label><input type="radio" name="operation_radio" value="subtract"> Вычитание</label>
                    <label><input type="radio" name="operation_radio" value="multiply"> Умножение</label>
                    <label><input type="radio" name="operation_radio" value="divide"> Деление</label>
                </div>
                <button type="submit" name="task4">Вычислить</button>
            </form>
            <?php if (isset($results['task4'])): ?>
                <div class="result">Результат: <?= $results['task4'] ?></div>
            <?php elseif (isset($errors['task4'])): ?>
                <div class="error"><?= $errors['task4'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 5: Чекбоксы для выбора нескольких операций -->
        <div class="task-section">
            <h3>Задание 5: Чекбоксы для выбора нескольких операций</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="operations[]" value="add"> Сложение</label>
                    <label><input type="checkbox" name="operations[]" value="subtract"> Вычитание</label>
                    <label><input type="checkbox" name="operations[]" value="multiply"> Умножение</label>
                    <label><input type="checkbox" name="operations[]" value="divide"> Деление</label>
                </div>
                <button type="submit" name="task5">Вычислить</button>
            </form>
            <?php if (isset($results['task5'])): ?>
                <div class="result">
                    <?php foreach ($results['task5'] as $op => $value): ?>
                        <p><?= ucfirst($op) ?>: <?= $value ?></p>
                    <?php endforeach; ?>
                </div>
            <?php elseif (isset($errors['task5'])): ?>
                <div class="error"><?= $errors['task5'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 6: Ползунки для сложения -->
        <div class="task-section">
            <h3>Задание 6: Ползунки для сложения</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="range" name="num1" id="num1" min="0" max="100" value="0" oninput="document.getElementById('num1-value').innerText = this.value">
                    <span id="num1-value">0</span>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="range" name="num2" id="num2" min="0" max="100" value="0" oninput="document.getElementById('num2-value').innerText = this.value">
                    <span id="num2-value">0</span>
                </div>
                <button type="submit" name="task6">Вычислить сумму</button>
            </form>
            <?php if (isset($results['task6'])): ?>
                <div class="result">Результат: <?= $results['task6'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 7: Шаговые числовые поля -->
        <div class="task-section">
            <h3>Задание 7: Шаговые числовые поля</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" step="0.1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" step="0.1" required>
                </div>
                <button type="submit" name="task7">Вычислить сумму</button>
            </form>
            <?php if (isset($results['task7'])): ?>
                <div class="result">Результат: <?= $results['task7'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 8: Скрытое поле для возведения в степень -->
        <div class="task-section">
            <h3>Задание 8: Возведение в степень</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Степень:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <input type="hidden" name="operation" value="power">
                <button type="submit" name="task8">Вычислить</button>
            </form>
            <?php if (isset($results['task8'])): ?>
                <div class="result">Результат: <?= $results['task8'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 9: Вычисление математического выражения -->
        <div class="task-section">
            <h3>Задание 9: Вычисление выражения</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="expression">Введите выражение:</label>
                    <textarea name="expression" id="expression" rows="3" required></textarea>
                </div>
                <button type="submit" name="task9">Вычислить</button>
            </form>
            <?php if (isset($results['task9'])): ?>
                <div class="result">Результат: <?= $results['task9'] ?></div>
            <?php elseif (isset($errors['task9'])): ?>
                <div class="error"><?= $errors['task9'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 10: Смешивание цветов -->
        <div class="task-section">
            <h3>Задание 10: Смешивание цветов</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="color1">Цвет 1:</label>
                    <input type="color" name="color1" id="color1" value="#ff0000">
                </div>
                <div class="form-group">
                    <label for="color2">Цвет 2:</label>
                    <input type="color" name="color2" id="color2" value="#0000ff">
                </div>
                <button type="submit" name="task10">Смешать цвета</button>
            </form>
            <?php if (isset($results['task10'])): ?>
                <div class="result">
                    <p>Цвет 1: <span class="color-box" style="background-color: <?= $results['task10']['color1'] ?>"></span></p>
                    <p>Цвет 2: <span class="color-box" style="background-color: <?= $results['task10']['color2'] ?>"></span></p>
                    <p>Смешанный цвет: <span class="color-box" style="background-color: <?= $results['task10']['mixed'] ?>"></span></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Раздел III: Загрузка и обработка файлов -->
    <section>
        <h2>Раздел III: Загрузка и обработка файлов</h2>

        <!-- Задание 11: Загрузка текстового файла с двумя числами -->
        <div class="task-section">
            <h3>Задание 11: Загрузка текстового файла с двумя числами</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Загрузите файл с двумя числами:</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" name="task11">Загрузить и вычислить</button>
            </form>
            <?php if (isset($results['task11'])): ?>
                <div class="result">
                    <p>Сумма: <?= $results['task11']['sum'] ?></p>
                    <p>Разность: <?= $results['task11']['difference'] ?></p>
                    <p>Произведение: <?= $results['task11']['product'] ?></p>
                    <p>Частное: <?= $results['task11']['quotient'] ?></p>
                </div>
            <?php elseif (isset($errors['task11'])): ?>
                <div class="error"><?= $errors['task11'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 12: Проверка корректности содержимого файла -->
        <div class="task-section">
            <h3>Задание 12: Проверка корректности содержимого файла</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Загрузите файл с двумя числами:</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" name="task12">Загрузить и вычислить</button>
            </form>
            <?php if (isset($results['task12'])): ?>
                <div class="result">
                    <p>Сумма: <?= $results['task12']['sum'] ?></p>
                    <p>Разность: <?= $results['task12']['difference'] ?></p>
                    <p>Произведение: <?= $results['task12']['product'] ?></p>
                    <p>Частное: <?= $results['task12']['quotient'] ?></p>
                </div>
            <?php elseif (isset($errors['task12'])): ?>
                <div class="error"><?= $errors['task12'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 13: Загрузка файла с несколькими парами чисел -->
        <div class="task-section">
            <h3>Задание 13: Загрузка файла с несколькими парами чисел</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Загрузите файл с несколькими парами чисел:</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" name="task13">Загрузить и вычислить</button>
            </form>
            <?php if (isset($results['task13'])): ?>
                <div class="result">
                    <?php foreach ($results['task13'] as $pair): ?>
                        <p>Числа: <?= implode(', ', $pair['numbers']) ?>, Сумма: <?= $pair['sum'] ?></p>
                    <?php endforeach; ?>
                </div>
            <?php elseif (isset($errors['task13'])): ?>
                <div class="error"><?= $errors['task13'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 14: Загрузка файла с математическим выражением -->
        <div class="task-section">
            <h3>Задание 14: Загрузка файла с математическим выражением</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Загрузите файл с выражением:</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" name="task14">Загрузить и вычислить</button>
            </form>
            <?php if (isset($results['task14'])): ?>
                <div class="result">Результат: <?= $results['task14'] ?></div>
            <?php elseif (isset($errors['task14'])): ?>
                <div class="error"><?= $errors['task14'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 15: Визуализация числовых данных из файла -->
        <div class="task-section">
            <h3>Задание 15: Визуализация числовых данных из файла</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Загрузите файл с числами:</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" name="task15">Загрузить и визуализировать</button>
            </form>
            <?php if (isset($results['task15'])): ?>
                <div class="graph">
                    <?php foreach ($results['task15'] as $number): ?>
                        <div class="graph-bar" style="height: <?= $number ?>px;"><?= $number ?></div>
                    <?php endforeach; ?>
                </div>
            <?php elseif (isset($errors['task15'])): ?>
                <div class="error"><?= $errors['task15'] ?></div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Раздел IV: Группировка и структурирование данных -->
    <section>
        <h2>Раздел IV: Группировка и структурирование данных</h2>

        <!-- Задание 16: Группировка полей ввода и операций -->
        <div class="task-section">
            <h3>Задание 16: Группировка полей ввода и операций</h3>
            <form method="POST">
                <fieldset>
                    <legend>Введите числа</legend>
                    <div class="form-group">
                        <label for="num1">Число 1:</label>
                        <input type="number" name="num1" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Число 2:</label>
                        <input type="number" name="num2" id="num2" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Выберите операцию</legend>
                    <div class="form-group">
                        <select name="operation" id="operation">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" name="task16">Вычислить</button>
            </form>
            <?php if (isset($results['task16'])): ?>
                <div class="result">Результат: <?= $results['task16'] ?></div>
            <?php elseif (isset($errors['task16'])): ?>
                <div class="error"><?= $errors['task16'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 17: Табличный ввод нескольких пар чисел -->
        <div class="task-section">
            <h3>Задание 17: Табличный ввод нескольких пар чисел</h3>
            <form method="POST">
                <div class="form-group">
                    <table>
                        <thead>
                            <tr>
                                <th>Число 1</th>
                                <th>Число 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 3; $i++): ?>
                                <tr>
                                    <td><input type="number" name="pairs[<?= $i ?>][num1]" required></td>
                                    <td><input type="number" name="pairs[<?= $i ?>][num2]" required></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" name="task17">Вычислить суммы</button>
            </form>
            <?php if (isset($results['task17'])): ?>
                <div class="result">
                    <?php foreach ($results['task17'] as $pair): ?>
                        <p>Числа: <?= implode(', ', $pair['numbers']) ?>, Сумма: <?= $pair['sum'] ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Задание 18: Подгруппы операций -->
        <div class="task-section">
            <h3>Задание 18: Подгруппы операций</h3>
            <form method="POST">
                <fieldset>
                    <legend>Основная операция</legend>
                    <div class="form-group">
                        <label for="num1">Число 1:</label>
                        <input type="number" name="num1" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Число 2:</label>
                        <input type="number" name="num2" id="num2" required>
                    </div>
                    <div class="form-group">
                        <select name="operation1" id="operation1">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Дополнительная операция</legend>
                    <div class="form-group">
                        <select name="operation2" id="operation2">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" name="task18">Вычислить</button>
            </form>
            <?php if (isset($results['task18'])): ?>
                <div class="result">
                    <p>Основная операция: <?= $results['task18']['operation1'] ?></p>
                    <p>Дополнительная операция: <?= $results['task18']['operation2'] ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Задание 19: Основная и дополнительная операции -->
        <div class="task-section">
            <h3>Задание 19: Основная и дополнительная операции</h3>
            <form method="POST">
                <fieldset>
                    <legend>Введите числа</legend>
                    <div class="form-group">
                        <label for="num1">Число 1:</label>
                        <input type="number" name="num1" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Число 2:</label>
                        <input type="number" name="num2" id="num2" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Выберите операции</legend>
                    <div class="form-group">
                        <label>Основная операция:</label>
                        <select name="main_operation" id="main_operation">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Дополнительная операция:</label>
                        <select name="secondary_operation" id="secondary_operation">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" name="task19">Вычислить</button>
            </form>
            <?php if (isset($results['task19'])): ?>
                <div class="result">
                    <p>Основная операция: <?= $results['task19']['main'] ?></p>
                    <p>Дополнительная операция: <?= $results['task19']['secondary'] ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Задание 20: Динамически добавляемые поля -->
        <div class="task-section">
            <h3>Задание 20: Динамически добавляемые поля</h3>
            <form method="POST">
                <div class="form-group">
                    <div id="dynamic-fields" class="dynamic-fields">
                        <input type="number" name="numbers[]" required>
                    </div>
                    <button type="button" onclick="addField()">Добавить поле</button>
                </div>
                <button type="submit" name="task20">Вычислить сумму</button>
            </form>
            <?php if (isset($results['task20'])): ?>
                <div class="result">Сумма: <?= $results['task20'] ?></div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Раздел V: Визуализация и интерактивность -->
    <section>
        <h2>Раздел V: Визуализация и интерактивность</h2>

        <!-- Задание 21: Визуализация отношения двух чисел -->
        <div class="task-section">
            <h3>Задание 21: Визуализация отношения двух чисел</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <button type="submit" name="task21">Вычислить отношение</button>
            </form>
            <?php if (isset($results['task21'])): ?>
                <div class="result">
                    <p>Число 1: <?= $results['task21']['num1'] ?></p>
                    <p>Число 2: <?= $results['task21']['num2'] ?></p>
                    <p>Отношение: <?= $results['task21']['ratio'] ?></p>
                    <meter value="<?= $results['task21']['ratio'] ?>" min="0" max="10"></meter>
                </div>
            <?php endif; ?>
        </div>

        <!-- Задание 22: Графическое отображение вводимых чисел -->
        <div class="task-section">
            <h3>Задание 22: Графическое отображение вводимых чисел</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="numbers">Введите числа через запятую:</label>
                    <input type="text" name="numbers" id="numbers" required>
                </div>
                <button type="submit" name="task22">Построить график</button>
            </form>
            <?php if (isset($results['task22'])): ?>
                <canvas id="chart" width="400" height="200"></canvas>
                <script>
                    const ctx = document.getElementById('chart').getContext('2d');
                    const numbers = <?= json_encode($results['task22']) ?>;
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: numbers.map((_, i) => `Число ${i + 1}`),
                            datasets: [{
                                label: 'Значения',
                                data: numbers,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            <?php endif; ?>
        </div>

        <!-- Задание 23: Визуализация результатов вычислений -->
        <div class="task-section">
            <h3>Задание 23: Визуализация результатов вычислений</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <button type="submit" name="task23">Вычислить</button>
            </form>
            <?php if (isset($results['task23'])): ?>
                <div class="result">
                    <p>Сумма: <progress value="<?= $results['task23']['sum'] ?>" max="100"></progress></p>
                    <p>Разность: <progress value="<?= $results['task23']['difference'] ?>" max="100"></progress></p>
                    <p>Произведение: <progress value="<?= $results['task23']['product'] ?>" max="100"></progress></p>
                    <p>Частное: <progress value="<?= $results['task23']['quotient'] ?>" max="100"></progress></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Задание 24: Обработка формы с помощью AJAX -->
        <div class="task-section">
            <h3>Задание 24: Обработка формы с помощью AJAX</h3>
            <form id="ajax-form" method="POST" onsubmit="submitForm(event)">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" required>
                </div>
                <button type="submit" name="task24">Вычислить сумму</button>
            </form>
            <div id="ajax-result"></div>
        </div>

        <!-- Задание 25: Динамическое обновление результата -->
        <div class="task-section">
            <h3>Задание 25: Динамическое обновление результата</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Число 1:</label>
                    <input type="number" name="num1" id="num1" oninput="updateResult()" required>
                </div>
                <div class="form-group">
                    <label for="num2">Число 2:</label>
                    <input type="number" name="num2" id="num2" oninput="updateResult()" required>
                </div>
                <div class="result">Результат: <span id="dynamic-result">0</span></div>
            </form>
        </div>
    </section>

    <!-- Раздел VI: Многошаговые формы и сложные процессы -->
    <section>
        <h2>Раздел VI: Многошаговые формы и сложные процессы</h2>

        <!-- Задание 26: Многошаговая форма -->
        <div class="task-section">
            <h3>Задание 26: Многошаговая форма</h3>
            <?php if (!isset($results['task26']) || $results['task26']['step'] == 1): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="num1">Число 1:</label>
                        <input type="number" name="num1" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Число 2:</label>
                        <input type="number" name="num2" id="num2" required>
                    </div>
                    <input type="hidden" name="step" value="1">
                    <button type="submit" name="task26">Далее</button>
                </form>
            <?php elseif ($results['task26']['step'] == 2): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="operation">Выберите операцию:</label>
                        <select name="operation" id="operation">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                    <input type="hidden" name="step" value="2">
                    <button type="submit" name="task26">Вычислить</button>
                </form>
            <?php else: ?>
                <div class="result">Результат: <?= $results['task26'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Задание 27: Сохранение промежуточных результатов -->
        <div class="task-section">
            <h3>Задание 27: Сохранение промежуточных результатов</h3>
            <?php if (!isset($results['task27']) || $results['task27']['step'] == 1): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="num1">Число 1:</label>
                        <input type="number" name="num1" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Число 2:</label>
                        <input type="number" name="num2" id="num2" required>
                    </div>
                    <input type="hidden" name="step" value="1">
                    <button type="submit" name="task27">Далее</button>
                </form>
            <?php elseif ($results['task27']['step'] == 2): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="operation">Выберите операцию:</label>
                        <select name="operation" id="operation">
                            <option value="add">Сложение</option>
                            <option value="subtract">Вычитание</option>
                            <option value="multiply">Умножение</option>
                            <option value="divide">Деление</option>
                        </select>
                    </div>
                    <input type="hidden" name="step" value="2">
                    <button type="submit" name="task27">Вычислить</button>
                </form>
            <?php else: ?>
                <div class="result">Результат: <?= $results['task27'] ?></div>
            <?php endif; ?>
        </div>
    </section>

  <script>
     document.getElementById('task1-form').addEventListener('submit', function (event) {
         event.preventDefault(); // Отменяем стандартную отправку формы

         const formData = new FormData(this);

         fetch('', {
             method: 'POST',
             body: formData,
             headers: {
                 'X-Requested-With': 'XMLHttpRequest'
             }
         })
         .then(response => response.text())
         .then(data => {
             document.getElementById('task1-result').innerHTML = data;
         })
         .catch(error => {
             console.error('Ошибка:', error);
         });
     });
 </script>
</body>
</html>