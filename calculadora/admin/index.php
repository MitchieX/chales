<?php
session_start();
$_SESSION["auth"] = false;


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

  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <main id="login">
    <h1>Login</h1>
    <form action="routes.php" method="post">
      <input type="hidden" name="action" value="login">
      <div class="input-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
      </div>

      <div class="input-group">
        <label for="email">Senha:</label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
      </div>

      <button type="submit" class="btn-green">Entrar</button>
      <a href="../" class="btn-bottom-line-green">Voltar</a>
    </form>
  </main>

</body>

</html>