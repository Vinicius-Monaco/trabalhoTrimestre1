<?php
    require_once "../backend/conexao.php"
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="index.css">
      <title>Document</title>
  </head>
  <body>
      <div class="form-container" >
          <form action="../backend/controller/PapelController.php" method="post" class="form">
              <h2 class="titulo-form">Cadastro's Pizza</h2>
              <p>div</p>
              <input type="text" name="email" id="email-input">
              <input type="text" name="usuario" id="usuario-input">
              <input type="password" name="senha" id="senha-input">
              <select name="papel" id="papel-input">
                <option value="">Administrador</option>
                <option value="">Fazendeiro</option>
                <option value="">Muambeiro</option>
              </select>
              <input type="submit" value="ENVIAR" />
          </form>
      </div>
  
  </body>
  </html>