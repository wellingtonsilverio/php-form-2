<?php
$array = [];
$return = [];
$file = fopen('file.bin', 'r');

if ($file == false) {
  $error = array('1', 'Não foi possível criar o arquivo.');
}

while (true) {
  $linha = fgets($file);
  if ($linha == null) break;
  $array = explode(';', substr($linha, 0, -1));
}

fclose($file);

$columName = array('nome' => 'Nome', 'ra' => 'RA', 'sexo' => 'Sexo', 'idade' => 'Idade', 'endereco' => 'Endereço', 'telefone' => 'Telefone', 'mail' => 'e-mail');
$columId = array('nome', 'ra', 'sexo', 'idade', 'endereco', 'telefone', 'mail');

foreach ($array as &$line) {
  $returnLine = [];
  foreach (explode(', ', $line) as $key => $column) {
    $returnLine[$columId[$key]] = $column;
  }
  if (count($returnLine) > 1) {
    array_push($return, $returnLine);
  }
}

// foreach (explode(', ', $array) as $key => $column) {
//   echo $columName[$key] . ': ' . $column . ' ';
// }


$ra = array_column($return, 'ra');

array_multisort($ra, SORT_ASC, $return);
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
  <div class="wrapper">
    <?php require('menu.php') ?>
    <div class="login-box">
      <h2>Lista de alunos por RA</h2>
      <?php if (count($error) > 1) { ?>
        <div class="error">
          <?php echo $error[1]; ?>
        </div>
      <?php } ?>
      <?php
      if (count($array) > 0) {
        echo '<ul>';
        foreach ($return as &$line) {
          echo '<li>';
          foreach ($line as $key => $column) {
            echo '<b>' . $columName[$key] . ':</b> ' . $column . '<br />';
          }
          echo '<li>';
        }
        echo '</ul>';
      }
      ?>
    </div>
  </div>
</body>

</html>