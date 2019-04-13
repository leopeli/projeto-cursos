<?php 
  require "funcoesLogin.php";
  include "inc/head.php";

  if($_REQUEST) {
    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];
    $confirmarSenha = $_REQUEST["confirmarSenha"];

    if($senha == $confirmarSenha) {
      $novoUsuario = [
        "nome" => $nome,
        "email" => $email,
        "senha" => $senha,
      ];

      $cadastrou = cadastrarUsuario($novoUsuario);

    } else {
      $erro = "Senhas Incompativeis";
    }

  }
?>
  <div class="page-center">
    <h2>Cadastre-se</h2>
    <?php if(isset($cadastrou) && $cadastrou) : ?>
      <div class="alert alert-success" role="alert">
        <span>Usuário cadastrado com sucesso!</span>
      </div>
    <?php elseif (isset($erro)) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $erro ?>
      </div>
    <?php endif ?>
    <form action="cadastro.php" method="post" class="col-md-7">
      <div class="col-md-12">
        <label for="inputNome">Nome</label>
        <input type="text" name="nome" id="inputNome" class="form-control">
      </div>
      <div class="col-md-12">
        <label for="inputEmail">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control">
      </div>
      <div class="col-md-12">
        <label for="inputSenha">Senha</label>
        <input type="password" name="senha" id="inputSenha" class="form-control">
      </div>
      <div class="col-md-12">
        <label for="inputConfirmarSenha">Confirme sua Senha</label>
        <input type="password" name="confirmarSenha" id="inputConfirmarSenha" class="form-control">
      </div>
      <div class="col-md-12">
        <button class="btn btn-primary" type="submit">Cadastrar</button>
        <a href="login.php" class="col-md-offset-9">Fazer Login!</a>
      </div>
    </form>
  </div>





<?php 
  include "inc/footer.php";
?>