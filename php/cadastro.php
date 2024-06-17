<script src="../js/jquery.js"></script>

<?php
$errorConn = false;
$errorUserJaExiste = false;
$errorEmailJaUtilizado = false;
$errorSenhasDiferentes = false;
$erroruserorpassword = false;

try {
  include("conexão.php");

  if ($_POST) {
    $password = $_POST["password"];
    if ($password == "") {
      $mensagem = "";
    } elseif ($password == $password) {
      $user = filter_input(INPUT_POST, "user");
      $password = filter_input(INPUT_POST, "password");


      $sql1 = "SELECT user from alunos where user = '{$user}'";
      $select = mysqli_query($conn, $sql1);

      //se ja existir algum correspondente
      if (mysqli_num_rows($select) > 0) {
        $linha = mysqli_fetch_assoc($select);
        //se for o msm usuario
        if ($linha['user'] == $user) {
          $errorUserJaExiste = true;
          
        }
      } else {

        $sql = "INSERT INTO alunos (user, password) VALUES
                    ('$user','$password')";

        mysqli_query($conn, $sql);

        header("location: index.php");
      }
    } else {
      $errorSenhasDiferentes = true;
    }
  }
  mysqli_close($conn);
} catch (Exception $e) {
  $errorConn = true;
  echo $e;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link type="text/css" rel="stylesheet" href="../css/style.css" />
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  
  <link rel="stylesheet" href="../js/node_modules/sweetalert2/dist/sweetalert2.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
</head>

<body>

    <div class="error" style="display: none;">
        <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
        </div>
        <div class="error__title">Usuário já existe.</div>
        <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" id="botao_fechar" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg></div>
    </div>
    <script>
      $("#botao_fechar").click(function (e) { 
        e.preventDefault();
        $(".error").hide();
      });
      
    </script>
  <header>
    <h4>Searchbook</h4>
    <a id="inicio" href="inicio.html">Início</a>
    <a id="sobre" href="style">Sobre</a>
  </header>

  <div class="container">
    <div class="card-left">
      <img src="../Imgs/Bibliophile-bro.svg" />
    </div>
    <div class="card-right">
      <div class="login">
        <h1>Cadastre-se</h1>
        <form action="cadastro.php" method="POST">
          <div class="input-email">
            <input name="user" autocomplete="off" type="text" required />
            <i class="fa-solid fa-user"></i>
            <span>Usuário</span>
          </div>
          <div class="input-senha">
            <input name="password" autocomplete="off" type="password" required />
            <i class="fa-solid fa-key"></i>
            <span>Senha</span>
          </div>
          <div class="input-submit">
            <input type="submit" />

            Já tem conta? Faça <a href="index.php">login</a>
        </form>
      </div>
    </div>
  </div>

  <footer><a href="direitos.html">Direitos Autorais</a></footer>

</body>

</html>
<?php
if($errorUserJaExiste){
echo <<<HTML
<script>
  $(".error").show();
</script>
HTML;
}
?>