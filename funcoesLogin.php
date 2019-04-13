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
?>
