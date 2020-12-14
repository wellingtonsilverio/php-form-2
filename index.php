<?php
$name = $_POST["nome"];
$ra = $_POST["ra"];
$sex = $_POST["sexo"];
$years = $_POST["idade"];
$address = $_POST["endereco"];
$phone = $_POST["telefone"];
$mail = $_POST["mail"];

if ($name && $ra && $sex && $years && $address && $phone && $mail) {
  $file = fopen('file.bin', 'a');
  if ($file == false) {
    $error = array('1', 'VNão foi possível criar o arquivo.');
  } else {
    if (!fwrite($file, $name + ", " + $ra + ", " + $sex + ", " + $years + ", " + $address + ", " + $phone + ", " + $mail + ";")) {
      $error = array('1', 'Não foi possível atualizar o arquivo.');
    } else {
      $redirect = 1;
    }

    fclose($arquivo);
  }
} else if ($name || $ra || $sex || $years || $address || $phone || $mail) {
  $error = array('1', 'Você precisa preencher o formulario completo.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atividade 8: PHP - Formulário de cadastro</title>
  <link rel="stylesheet" href="index.styles.css">
</head>

<body>
  <div class="login-box">
    <h2>Formulário de cadastro de aluno</h2>
    <form method="post">
      <div class="user-box">
        <input type="text" name="nome" required="">
        <label>Nome</label>
      </div>
      <div class="user-box">
        <input type="text" name="ra" required="">
        <label>RA</label>
      </div>
      <div class="user-box">
        <input type="text" name="sexo" required="">
        <label>Sexo</label>
      </div>
      <div class="user-box">
        <input type="text" name="idade" required="">
        <label>Idade</label>
      </div>
      <div class="user-box">
        <input type="text" name="endereco" required="">
        <label>Endereço</label>
      </div>
      <div class="user-box">
        <input type="text" name="telefone" required="">
        <label>Telefone</label>
      </div>
      <div class="user-box">
        <input type="text" name="mail" required="">
        <label>e-mail</label>
      </div>
      <div>
        <?php print_r($error); ?>
      </div>
      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        CADASTRAR
      </button>
    </form>
  </div>
</body>

</html>