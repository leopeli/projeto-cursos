<?php 
  include "inc/head.php";
  include "inc/header.php";

  if($_FILES) {
    if($_FILES["arquivo"]["error"] == UPLOAD_ERR_OK){
      $nomeArquivo = $_FILES["arquivo"]["name"];
      $nomeTemp = $_FILES["arquivo"]["tmp_name"];
      $pastaRaiz = dirname(__FILE__);
      $pastaDesejada = "assets\img\\";
      $caminhoCompleto = $pastaRaiz . $pastaDesejada . "avatar.jpg";
      move_uploaded_file($nomeTemp, $caminhoCompleto);
    }
  }

?>
<div class="page-center">
  <div class="col-md-3">
    <div class="thumbnail">
      <img src="assets/img/avatar.jpg" alt="Foto de perfil">
      <div class="caption">
        <h2>Usuario</h2>
        <p>Email</p>
        <form action="usuario.php" method="post" enctype="multipart/form-data">
          <label for="inputArquivo">Escolha sua foto</label>
          <input type="file" class="btn btn-info" id="inputArquivo" name="arquivo">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
  include "inc/footer.php";
?>