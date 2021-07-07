<?php

require_once "model/Connection.php";
require_once "model/Interval/IntervalDAO.php";
require_once "controller/IntervalController.php";

$interval = IntervalController::get_interval();

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

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <main id="calculator">
    <h1>Calculadora de preço</h1>

    <div class="message">
      Número total de pessoas deve ser maior que zero
      <span onclick="toggleActiveMessage()"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>

    <form action="result.php" method="POST" onsubmit="validatePeopleFields(event)">
      <div class="input-group" class="item1">
        <label for="type">Tipo de reserva</label>
        <select name="type" id="type" required>
          <option value="" disabled selected hidden>Selecione o tipo de reserva</option>
          <option value="1">Chalé</option>
          <option value="2">Apartamento</option>
        </select>
      </div>

      <div class="input-group item2">
        <label for="checkin">Check-in</label>
        <input type="date" name="checkin" id="checkin" onChange="handleCheckin()" required>
      </div>

      <div class="input-group item3">
        <label for="checkout">Check-out</label>
        <input type="date" name="checkout" id="checkout" disabled required>
      </div>

      <div id="box-people" class="item4">
        <div id="people">
          <span class="title">Informe o número de pessoas</span>
        </div>

        <div class="people-container">
          <div class="people-group">
            <div>Individual</div>
            <div class="buttons">
              <button type="button" onclick="subtract('single')"> - </button>
              <span id="single-quantity">0</span>
              <button type="button" onclick="add('single')"> + </button>
            </div>
          </div>

          <div class="people-group">
            <div>Crianças com menos de 6 anos</div>
            <div class="buttons">
              <button type="button" onclick="subtract('underSix')"> - </button>
              <span id="underSix-quantity">0</span>
              <button type="button" onclick="add('underSix')"> + </button>
            </div>
          </div>

          <div class="people-group">
            <div>Casal</div>
            <div class="buttons">
              <button type="button" onclick="subtract('couple')"> - </button>
              <span id="couple-quantity">0</span>
              <button type="button" onclick="add('couple')"> + </button>
            </div>
          </div>

          <div class="people-group">
            <div>Crianças entre 6 e 11 anos</div>
            <div class="buttons">
              <button type="button" onclick="subtract('underEleven')"> - </button>
              <span id="underEleven-quantity">0</span>
              <button type="button" onclick="add('underEleven')"> + </button>
            </div>
          </div>
        </div>
      </div>

      <input type="hidden" value="0" min="0" step="1" name="single" id="single" required>
      <input type="hidden" value="0" min="0" step="1" name="couple" id="couple" required>
      <input type="hidden" value="0" min="0" step="1" name="underSix" id="underSix" required>
      <input type="hidden" value="0" min="0" step="1" name="underEleven" id="underEleven" required>

      <button type="submit" class="btn-green item5">Calcular</button>
    </form>
    <a href="../" class="btn-bottom-line-green">Voltar ao site</a>
  </main>

  <script>
    const interval = Number(<?= $interval ?>);
  </script>
  <script src="./scripts.js"></script>
</body>

</html>