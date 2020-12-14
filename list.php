<?php
$array = [];
$file = fopen('file.bin', 'r');

if ($file == false) {
  $error = array('1', 'Não foi possível criar o arquivo.');
}

while (true) {
  $linha = fgets($file);
  if ($linha == null) break;
  array_push($array, $linha);
}

fclose($file);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atividade 8: PHP - Lista de cadastro</title>
  <link rel="stylesheet" href="index.styles.css">
</head>

<body>
  <div class="login-box">
    <h2>Lista de alunos por RA</h2>
    <?php if (count($error) > 1) { ?>
      <div class="error">
        <?php print_r($error); ?>
      </div>
    <?php } ?>
    <?php print_r($array) ?>
  </div>
</body>

</html>