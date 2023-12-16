<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Лабораторная работа №4</title>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Лабораторная работа №4</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5">Вычислить значение оплаты за энергию</h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="costPerKwh">Стоимость 1 кВт/час, руб:</label>
                <input type="text" class="form-control" id="costPerKwh" name="costPerKwh" required>
            </div>
            <div class="form-group">
                <label for="energyConsumed">Расход энергии, кВт/час:</label>
                <input type="text" class="form-control" id="energyConsumed" name="energyConsumed" required>
            </div>
            <div class="form-group">
                <label for="discount">Коэффициент льгот (если нет, то оставьте поле пустым):</label>
                <input type="text" class="form-control" id="discount" name="discount">
            </div>
            <button type="submit" class="btn btn-primary">Рассчитать</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем значения из формы
            $costPerKwh = floatval($_POST['costPerKwh']);
            $energyConsumed = floatval($_POST['energyConsumed']);
            $discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;

            // Рассчитываем сумму оплаты
            $totalPayment = $costPerKwh * $energyConsumed * (1 - $discount);

            // Выводим результат
            echo '<div class="mt-3 alert alert-success" role="alert">';
            echo 'Сумма оплаты за потребленную энергию: ' . number_format($totalPayment, 2) . ' руб.';
            echo '</div>';
        }
        ?>

    </main>

    <footer class="footer">
    </footer>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
