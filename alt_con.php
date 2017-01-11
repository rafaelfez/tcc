<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração";
$cnpj = $nome = $empresa = $categoria = $desconto = $mensalidade = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
  $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
  $desconto = filter_input(INPUT_POST, 'desconto', FILTER_SANITIZE_STRING);
  $mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_SANITIZE_NUMBER_INT);

  if(empty($cnpj) || empty($nome)|| empty($categoria) ||empty($empresa) ||empty($mensalidade) ||empty($desconto)){
    mesErro("Por favor insira todos os campos");
  }else{
    if(alterarConvenio($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto)){
      mesErro("Convênio Alterado");
    }else{
      mesErro("Não foi possível alterar");
    }
  }
}




include("inc/header.php");
?>

<div class="alterar">
  <h2>Alteração de Convenio</h2>
  <form class="form-alt-con" method="post" action="alt_con.php">
    <table>
        <tr>
          <th><label for="cnpj">CNPJ<span class="required">*</span></label></th>
          <td><input type="text" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($cnpj); ?>"/></td>
        </tr>
        <tr>
          <th><label for="nome">Nome<span class="required">*</span></label></th>
          <td><input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"/></td>
        </tr>
        <tr>
          <th><label for="empresa">Empresa<span class="required">*</span></label></th>
          <td><input type="text" id="empresa" name="empresa" value="<?php echo htmlspecialchars($empresa); ?>"/></td>
        </tr>
        <tr>
          <th><label for="categoria">Categoria<span class="required">*</span></label></th>
          <td><input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>"/></td>
        </tr>
        <tr>
          <th><label for="desconto">Desconto<span class="required">*<span></label></th>
          <td><select id="desconto" name="desconto">
            <option value="">Selecione um</option>
            <option value="DAS" <?php if($desconto == 'DAS') echo 'selected'; ?>>DAS</option>
            <option value="RCS" <?php if($desconto == 'RCS') echo 'selected'; ?>>RCS</option>
          </select></td>
        </tr>
        <tr>
          <th><label for="mensalidade">Mensalidade<span class="required">*</span></label></th>
          <td><input type="text" id="mensalidade" name="mensalidade" value="<?php echo htmlspecialchars($mensalidade); ?>"/></td>
        </tr>
      </table>
      <input class="button button--primary button--topic-php" type="submit" value="Alterar" />
      <input type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
    </form>
  </div>

<?php
include("inc/footer.php");
?>
