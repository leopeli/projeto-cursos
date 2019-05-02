<?php 
  require "req/funcoesLogin.php";
  include "inc/head.php";

  if ($_REQUEST) {
    //pagando os valores dos inputs
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];
    //verificando se o usurario esta logado atraves da funcao
    $nomeLogado = logarUsuario($email, $senha);
    if($nomeLogado) {
      session_start();
      $_SESSION["nome"] = $nomeLogado;
      $_SESSION["email"] = $email;
      $_SESSION["nivelAcesso"] = mt_rand(0, 1);
      $_SESSION["logado"] = true;
      header("Location: index.php");
    } else {
      $erro = "Usuario ou senha está errado!";
    }
  }
?>

<div class="page-center">
  <h2>Login</h2>
  <!-- mostra a mensagem de erro caso ela esteja definida -->
  <?php if (isset($erro)) : ?>
    <div class="alert alert-danger">
      <span><?php echo $erro ?></span>
    </div>
  <?php endif ?>

  <form action="login.php" method="post" class="col-md-7">
    <div class="col-md-12">
      <label for="inputEmail">Email</label>
      <input type="email" name="email" id="inputEmail" class="form-control">
    </div>
    <div class="col-md-12">
      <label for="inputSenha">Senha</label>
      <input type="password" name="senha" id="inputSenha" class="form-control">
    </div>
    <div class="col-md-12">
      <button class="btn btn-primary" type="submit">Logar</button>
      <a href="cadastro.php" class="col-md-offset-9">Fazer Cadastro!</a>
    </div>
  </form>
</div>

<?php 
  include "inc/footer.php"
?>