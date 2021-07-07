<?php

if (empty($_POST)) {
  header('Location: ./');
}

require_once "./controller/CalculatorController.php";

// Calcula a quantidade de dias entre check-in e check-out
$start_date = strtotime($_POST["checkin"]);
$end_date = strtotime($_POST["checkout"]);

$interval_in_days = ($end_date - $start_date) / 60 / 60 / 24;

// Calcula e formata o valor total a pagar
$result = CalculatorController::calculate($_POST);
$formated_result = number_format($result, 2, ',', '.');

// Calcula e formata o preço médio da diária
$price_per_day = $result / $interval_in_days;
$formated_price_per_day = number_format($price_per_day, 2, ',', '.');

// Formata as datas de check-in e check-out
$checkin = (new DateTime($_POST["checkin"])) -> format('d/m/Y');;
$checkout = (new DateTime($_POST["checkout"])) -> format('d/m/Y');;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Calculadora de Pousada</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/result.css">
</head>

<body>
  <main id="result">
    <div class="header">
      <h1>Chalé</h1>
      <small><?= "$checkin a $checkout" ?></small>
    </div>

    <p class="price">R$ <?= $formated_result ?></p>

    <div class="info">
      <span>R$ <?= $formated_price_per_day ?> / dia</span>
      <span><?= $interval_in_days ?> dia(s)</span>
    </div>

    <div class="people-statistics">
      <?php if ($_POST["single"] > 0) { ?>
        <p>
          <span class="number"><?= $_POST["single"] ?></span>
          <span>Individual</span>
        </p>
      <?php } ?>

      <?php if ($_POST["couple"] > 0) { ?>
        <p>
          <span class="number"><?= $_POST["couple"] ?></span>
          <span>Casal</span>
        </p>
      <?php } ?>

      <?php if ($_POST["underSix"] > 0) { ?>
        <p>
          <span class="number"><?= $_POST["underSix"] ?></span>
          <span>Criança com menos de 6 anos</span>
        </p>
      <?php } ?>

      <?php if ($_POST["underEleven"] > 0) { ?>
        <p>
          <span class="number"><?= $_POST["underEleven"] ?></span>
          <span>Criança entre 6 e 11 anos</span>
        </p>
      <?php } ?>
    </div>
    </div>

    <a href="./" class="btn-green">Calcular novamente</a>
  </main>

</body>

</html>