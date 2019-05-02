<?php 
  $nomeArquivo = "usuarios.json";

  function cadastrarUsuario($usuario) {
    global $nomeArquivo;

    $usuariosJson = file_get_contents($nomeArquivo);

    $arrayUsuarios = json_decode($usuariosJson, true);

    array_push($arrayUsuarios['usuarios'], $usuario);

    $usuariosJson = json_encode($arrayUsuarios);

    $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);

    return $cadastrou;
  }

  function logarUsuario($email, $senha) {
    global $nomeArquivo;
    $nomeLogado = "";
    $usuariosJson = file_get_contents($nomeArquivo);
  
    $arrayUsuarios = json_decode($usuariosJson, true);
    foreach($arrayUsuarios["usuarios"] as $chave => $valor) {
      //verificando se o email digitado é igua ao email do json
      if($valor["email"] = $email && password_verify($senha, $valor["senha"])) {
        $nomeLogado = $valor["nome"];
        break;
      }
    }
    return $nomeLogado;
  }
?>
